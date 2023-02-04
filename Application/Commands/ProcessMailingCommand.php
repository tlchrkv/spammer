<?php

declare(strict_types=1);

namespace SpammerApi\Application\Commands;

use SpammerApi\Domain\Mailing\MailingStorage;
use SpammerApi\Domain\Mailing\SubscriberMessage\MessageSender;
use SpammerApi\Domain\Mailing\SubscriberMessage\SubscriberMessageStorage;
use SpammerApi\Domain\SubscriberStorage;

final class ProcessMailingCommand
{
    public function __construct(
        private readonly MailingStorage $mailingStorage,
        private readonly SubscriberMessageStorage $subscriberMessageStorage,
        private readonly SubscriberStorage $subscriberStorage,
        private readonly MessageSender $messageSender
    ) {}

    public function __invoke(string $mailingId, int $intervalInSeconds): void
    {
        $mailing = $this->mailingStorage->find($mailingId);

        while (true) {
            $subscriberMessage = $this->subscriberMessageStorage->findFirstWaitingOrNull($mailingId);
            if ($subscriberMessage === null) {
                $mailing->finished();
                $this->mailingStorage->update($mailing);
                return;
            }

            $subscriberMessage->send($this->subscriberStorage, $this->messageSender, $mailing->title, $mailing->message);
            $this->subscriberMessageStorage->update($subscriberMessage);

            sleep($intervalInSeconds);
        }
    }
}
