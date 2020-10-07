<?php

namespace App\Entity;

use App\Repository\ChallengeCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeCategoryRepository::class)
 */
class ChallengeCategory
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
     * @ORM\OneToMany(targetEntity=Challenge::class, mappedBy="category")
     */
    private Collection $challenge;

    /**
     * @ORM\ManyToOne(targetEntity=ChallengeSection::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private ChallengeSection $section;

    public function __construct()
    {
        $this->challenge = new ArrayCollection();
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
     * @return Collection|Challenge[]
     */
    public function getChallenge(): Collection
    {
        return $this->challenge;
    }

    public function addChallenge(Challenge $challenge): self
    {
        if (!$this->challenge->contains($challenge)) {
            $this->challenge[] = $challenge;
            $challenge->setCategory($this);
        }

        return $this;
    }

    public function removeChallenge(Challenge $challenge): self
    {
        if ($this->challenge->contains($challenge)) {
            $this->challenge->removeElement($challenge);
            // set the owning side to null (unless already changed)
            if ($challenge->getCategory() === $this) {
                $challenge->setCategory(null);
            }
        }

        return $this;
    }

    public function getSection(): ?ChallengeSection
    {
        return $this->section;
    }

    public function setSection(ChallengeSection $section): self
    {
        $this->section = $section;

        return $this;
    }
}