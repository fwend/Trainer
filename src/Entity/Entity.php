<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

abstract class Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    protected ?PropertyAccessor $propertyAccessor = null;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected DateTime $created;

    /**
     * @Gedmo\Timestampable(on="change", field={"*"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected DateTime $modified;

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        $className = get_class($this);
        if (property_exists($className, 'name')) {
            return $this->getPropertyAccessor()->getValue($this, 'name');
        }
        return $className;
    }

    public function getPropertyAccessor(): PropertyAccessor
    {
        if (!$this->propertyAccessor) {
            $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
        }
        return $this->propertyAccessor;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return DateTime
     */
    public function getModified(): DateTime
    {
        return $this->modified;
    }
}