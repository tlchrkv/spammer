<?php

declare(strict_types=1);

namespace App\Domain\Mailing\SubscriberMessage;

use App\Domain\SubscriberStorage;

final class SubscriberMessage
{
    public function __construct(
        public string $id,
        public string $mailingId,
        public string $subscriberId,
        public Status $status,
        public ?\DateTimeInterface $sentAt,
        public ?string $errorMessage
    ) {}

    public static function createForMailing(string $mailingId, string $id, string $subscriberId): self
    {
        return new self(
            $id,
            $mailingId,
            $subscriberId,
            Status::WAITING,
            null,
            null
        );
    }

    public function send(
        SubscriberStorage $subscriberStorage,
        MessageSender $messageSender,
        string $title,
        string $message
    ): void {
        try {
            $subscriber = $subscriberStorage->find($this->subscriberId);
            $messageSender->send(
                $title,
                str_replace('%name%', mb_ucfirst($subscriber->name), $message),
                $subscriber->phone
            );
            $this->sent();
        } catch (MessageNotSent $error) {
            $this->errorOnSend($error->getMessage());
        }
    }

    private function sent(): void
    {
        $this->status = Status::SENT;
        $this->sentAt = new \DateTime('now');
    }

    private function errorOnSend(string $errorMessage): void
    {
        $this->status = Status::ERROR;
        $this->errorMessage = $errorMessage;
    }
}
