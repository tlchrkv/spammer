<?php

declare(strict_types=1);

namespace App\Application\Queries;

use App\Domain\Mailing\MailingStorage;

final class GetMailingsQuery
{
    public function __construct(
        private readonly MailingStorage $mailingStorage
    ) {}

    public function __invoke(): array
    {
        return $this->mailingStorage->get();
    }
}
