<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

trait CreatedAtTrait
{
    /**
     * @var null|DateTimeImmutable
     *
     * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"}, nullable=false)
     */
    protected DateTimeImmutable $createdAt;

    /**
     * @ORM\PrePersist
     */
    public function persistCreatedAt(): void
    {
        $this->setCreatedAt(new DateTimeImmutable());
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
