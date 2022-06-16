<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

interface AggregateRoot
{
    public function releaseEvents(): array;
}
