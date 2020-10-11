<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait PositionTrait
{
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $position;

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }
}