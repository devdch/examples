<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    protected ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isEqualById(int $id): bool
    {
        return $this->getId() === $id;
    }
}
