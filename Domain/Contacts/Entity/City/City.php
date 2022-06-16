<?php

declare(strict_types=1);

namespace App\Domain\Contacts\Entity\City;

use App\Domain\Shared\ApiException\DomainException;
use App\Domain\Shared\Entity\BeforeRemoveValidator;
use App\Domain\Shared\Entity\IdTrait;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 * @UniqueEntity("name", message="Город с таким именем уже добавлен")
 */
class City implements BeforeRemoveValidator
{
    use IdTrait;

    /**
     * @ORM\Embedded(class="CityName", columnPrefix="name_")
     */
    private CityName $name;

    /**
     * @ORM\Embedded(class="CityTimezone", columnPrefix="timezone_")
     */
    private CityTimezone $timezone;

    public function __construct(CityName $name, CityTimezone $timezone)
    {
        $this->name = $name;
        $this->timezone = $timezone;
    }

    public function getName(): CityName
    {
        return $this->name;
    }

    public function getTimezone(): CityTimezone
    {
        return $this->timezone;
    }

    /**
     * @throws DomainException
     */
    public function validateOnPreSoftDelete(): void
    {
        //validation
    }
}
