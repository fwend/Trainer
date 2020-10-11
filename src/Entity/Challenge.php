<?php

namespace App\Entity;

use App\Repository\ChallengeRepository;
use App\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeRepository::class)
 */
class Challenge extends Entity
{
    use NameTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $content;

    /**
     * @ORM\Column(type="array")
     */
    private array $answers = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $link;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $note;

    /**
     * @ORM\ManyToOne(targetEntity=ChallengeCategory::class, inversedBy="challenge")
     * @ORM\JoinColumn(nullable=false)
     */
    private ChallengeCategory $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAnswers(): ?array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): self
    {
        $this->answers = $answers;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCategory(): ?ChallengeCategory
    {
        return $this->category;
    }

    public function setCategory(ChallengeCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
