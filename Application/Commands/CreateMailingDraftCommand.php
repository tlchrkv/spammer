<?php

declare(strict_types=1);

namespace App\Application\Commands;

use App\Domain\Mailing\Mailing;
use App\Domain\Mailing\MailingStorage;
use App\Domain\Mailing\SubscriberMessage\SubscriberMessage;
use App\Domain\Mailing\SubscriberMessage\SubscriberMessageStorage;

final class CreateMailingDraftCommand
{
    public function __construct(
        private readonly MailingStorage $mailingStorage,
        private readonly SubscriberMessageStorage $subscriberMessageStorage
    ) {}

    public function __invoke(string $id, string $title, string $message, array $subscriberIds): void
    {
        $mailing = Mailing::createDraft($id, $title, $message);
        $this->mailingStorage->create($mailing);

        foreach ($subscriberIds as $subscriberId) {
            $subscriberMessage = SubscriberMessage::createForMailing($mailing->id, uuid4(), $subscriberId);
            $this->subscriberMessageStorage->create($subscriberMessage);
        }
    }
}
