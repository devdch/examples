<?php

declare(strict_types=1);

namespace App\Domain\Shared\Entity;

trait EventsTrait
{
    private array $recordedEvents = [];

    public function releaseEvents(): array
    {
        $events = $this->recordedEvents;
        $this->recordedEvents = [];

        return $events;
    }

    protected function recordEvent(object $event): void
    {
        $this->recordedEvents[] = $event;
    }
}
