<?php

declare(strict_types=1);

namespace App\Application\Commands;

use App\Domain\Mailing\MailingStorage;

final class StartMailingCommand
{
    public function __construct(
        private readonly MailingStorage $mailingStorage
    ) {}

    public function __invoke(string $mailingId): void
    {
        $mailing = $this->mailingStorage->find($mailingId);
        $mailing->start();
        $this->mailingStorage->update($mailing);
    }
}
