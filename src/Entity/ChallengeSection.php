<?php

namespace App\Entity;

use App\Repository\ChallengeSectionRepository;
use App\Traits\NameTrait;
use App\Traits\PositionTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeSectionRepository::class)
 */
class ChallengeSection extends Entity
{
    use PositionTrait, NameTrait;

    /**
     * @ORM\OneToMany(targetEntity=ChallengeCategory::class, mappedBy="section")
     */
    private Collection $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    /**
     * @return Collection|ChallengeCategory[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(ChallengeCategory $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setSection($this);
        }

        return $this;
    }

    public function removeCategory(ChallengeCategory $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getSection() === $this) {
                $category->setSection(null);
            }
        }

        return $this;
    }

    public function getChallengeRun(): ?ChallengeRun
    {
        return $this->challengeRun;
    }

    public function setChallengeRun(?ChallengeRun $challengeRun): self
    {
        $this->challengeRun = $challengeRun;

        return $this;
    }
}
