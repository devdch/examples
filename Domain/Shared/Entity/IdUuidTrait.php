<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait IdUuidTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    protected UuidInterface $id;

    public function __toString(): string
    {
        return $this->getId()->toString();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public static function nextId(): UuidInterface
    {
        return Uuid::uuid4();
    }
}
