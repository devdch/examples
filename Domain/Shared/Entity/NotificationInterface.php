<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

interface NotificationInterface
{
    public function addNotification(string $type): void;

    public function isNotifiedByType(string $type): bool;

    public function getNotifications(): array;
}
