<?php

namespace SpammerApi\Domain\Mailing;

interface MailingStorage
{
    public function create(Mailing $mailing): void;
    public function update(Mailing $mailing): void;
    public function find(string $id): Mailing;
    public function get(): array;
}
