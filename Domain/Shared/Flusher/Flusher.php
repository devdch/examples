<?php

declare(strict_types=1);

namespace App\Domain\Shared\Flusher;

use App\Domain\Shared\Entity\AggregateRoot;
use App\Domain\Shared\Event\EventDispatcher;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;

class Flusher implements FlusherInterface
{
    private EntityManagerInterface $em;
    private EventDispatcher $dispatcher;

    public function __construct(EntityManagerInterface $em, EventDispatcher $dispatcher)
    {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    public function flush(AggregateRoot ...$roots): void
    {
        $this->em->flush();

        foreach ($roots as $root) {
            $this->dispatcher->dispatch($root->releaseEvents());
        }
    }

    public function persist($objects): FlusherInterface
    {
        if (!is_iterable($objects)) {
            $objects = [$objects];
        }

        foreach ($objects as $object) {
            $this->em->persist($object);
        }

        return $this;
    }

    public function remove($objects): FlusherInterface
    {
        if (!is_iterable($objects)) {
            $objects = [$objects];
        }

        foreach ($objects as $object) {
            $this->em->remove($object);
        }

        return $this;
    }

    public function refresh($objects): FlusherInterface
    {
        if (!is_iterable($objects)) {
            $objects = [$objects];
        }

        foreach ($objects as $object) {
            $this->em->refresh($object);
        }

        return $this;
    }

    public function clear(): FlusherInterface
    {
        $this->em->clear();

        return $this;
    }

    /**
     * @param $id
     *
     * @throws ORMException
     */
    public function removeById(string $entityName, $id): FlusherInterface
    {
        $entity = $this->em->getReference($entityName, $id);

        return $this->remove($entity);
    }
}
