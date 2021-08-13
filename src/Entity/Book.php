<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $onBorrow;

    /**
     * @ORM\OneToOne(targetEntity=Publication::class, mappedBy="book", cascade={"persist", "remove"})
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity=ReadingLevel::class, inversedBy="books")
     */
    private $readingLevel;

    /**
     * @ORM\OneToMany(targetEntity=Borrow::class, mappedBy="book")
     */
    private $borrows;

    public function __construct()
    {
        $this->borrows = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getOnBorrow(): ?int
    {
        return $this->onBorrow;
    }

    public function setOnBorrow(?int $onBorrow): self
    {
        $this->onBorrow = $onBorrow;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): self
    {
        // unset the owning side of the relation if necessary
        if ($publication === null && $this->publication !== null) {
            $this->publication->setBook(null);
        }

        // set the owning side of the relation if necessary
        if ($publication !== null && $publication->getBook() !== $this) {
            $publication->setBook($this);
        }

        $this->publication = $publication;

        return $this;
    }

    public function getReadingLevel(): ?ReadingLevel
    {
        return $this->readingLevel;
    }

    public function setReadingLevel(?ReadingLevel $readingLevel): self
    {
        $this->readingLevel = $readingLevel;

        return $this;
    }

    /**
     * @return Collection|Borrow[]
     */
    public function getBorrows(): Collection
    {
        return $this->borrows;
    }

    public function addBorrow(Borrow $borrow): self
    {
        if (!$this->borrows->contains($borrow)) {
            $this->borrows[] = $borrow;
            $borrow->setBook($this);
        }

        return $this;
    }

    public function removeBorrow(Borrow $borrow): self
    {
        if ($this->borrows->removeElement($borrow)) {
            // set the owning side to null (unless already changed)
            if ($borrow->getBook() === $this) {
                $borrow->setBook(null);
            }
        }

        return $this;
    }
}
