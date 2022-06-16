<?php

declare(strict_types=1);

namespace App\Domain\Shared\Flusher;

use App\Domain\Shared\Entity\AggregateRoot;

interface FlusherInterface
{
    public function persist($objects): FlusherInterface;

    public function remove($objects): FlusherInterface;

    public function refresh($objects): FlusherInterface;

    public function clear(): FlusherInterface;

    public function flush(AggregateRoot ...$roots): void;

    public function removeById(string $entityName, $id): FlusherInterface;
}
