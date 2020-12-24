<?php

namespace App\Entity;

use App\Traits\NameTrait;
use App\Traits\PositionTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class RunMode extends Entity
{
    public const TYPE_ALL = 0;
    public const TYPE_RANDOM = 1;

    use PositionTrait, NameTrait;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $length = null;

    /**
     * @ORM\Column(type="integer")
     */
    protected int $type = 0;

    /**
     * @return int|null
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * @param int|null $length
     * @return RunMode
     */
    public function setLength(?int $length): RunMode
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return RunMode
     */
    public function setType(int $type): RunMode
    {
        $this->type = $type;
        return $this;
    }

}