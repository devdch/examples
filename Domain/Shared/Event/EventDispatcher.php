<?php

declare(strict_types=1);

namespace App\Domain\Shared\Event;

interface EventDispatcher
{
    public function dispatch(array $events): void;
}
