<?php

namespace App\Entity;

use App\Repository\ChallengeSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeSectionRepository::class)
 */
class ChallengeSection extends Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $position;

    /**
     * @ORM\OneToMany(targetEntity=ChallengeCategory::class, mappedBy="section")
     */
    private Collection $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
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
}
