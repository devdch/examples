<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

trait DeletedAtTrait
{
    /**
     * @ORM\Column(type="datetime_immutable", name="deleted_at", nullable=true)
     */
    protected ?DateTimeImmutable $deletedAt;

    /**
     * @ORM\PreRemove
     */
    public function remove(): void
    {
        $this->setDeletedAt(new DateTimeImmutable());
    }

    public function getDeletedAt(): ?DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(DateTimeImmutable $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}
