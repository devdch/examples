<?php

declare(strict_types=1);

namespace App\Domain\Shared\Event\Listener;

use App\Domain\Shared\Entity\BeforeRemoveValidator;
use Doctrine\ORM\Event\LifecycleEventArgs;

class EntityDeleteListener
{
    public function preSoftDelete(LifecycleEventArgs $args): void
    {
        $object = $args->getEntity();

        if (!$object instanceof BeforeRemoveValidator) {
            return;
        }

        $object->validateOnPreSoftDelete();
    }
}
