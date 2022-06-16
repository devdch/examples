<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

use Doctrine\ORM\Mapping as ORM;

trait NotificationTrait
{
    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private ?array $notifications;

    public function addNotification(string $type): void
    {
        if (!$notifications = $this->notifications) {
            $notifications = [];
        }

        $notifications[] = $type;
        $notifications = array_unique($notifications);

        $this->notifications = $notifications;
    }

    public function isNotifiedByType(string $type): bool
    {
        if (!$notifications = $this->getNotifications()) {
            return false;
        }

        return in_array($type, $notifications, true);
    }

    public function getNotifications(): array
    {
        return (array)$this->notifications;
    }
}
