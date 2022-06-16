<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

interface BeforeRemoveValidator
{
    public function validateOnPreSoftDelete(): void;
}
