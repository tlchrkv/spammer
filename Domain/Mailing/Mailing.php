<?php

namespace SpammerApi\Domain\Mailing;

final class Mailing
{
    public function __construct(
        public string $id,
        public string $title,
        public string $message,
        public Status $status
    ) {}

    public static function createDraft(
        string $id,
        string $title,
        string $message
    ): self {
        return new self(
            $id,
            $title,
            $message,
            Status::DRAFT
        );
    }

    public function start(): void
    {
        $this->status = Status::IN_PROCESS;
    }

    public function stop(): void
    {
        $this->status = Status::STOPPED;
    }

    public function finished(): void
    {
        $this->status = Status::FINISHED;
    }
}
