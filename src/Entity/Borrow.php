<?php

namespace App\Entity;

use App\Repository\BorrowRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowRepository::class)
 */
class Borrow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $borrowDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dueDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $returnDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $conditionBeforeBorrow;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $conditionWhenReturned;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="borrows")
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="borrows")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Librarian::class, inversedBy="borrows")
     */
    private $librarian;

    /**
     * @ORM\ManyToOne(targetEntity=Penalty::class, inversedBy="borrows")
     */
    private $penalty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->borrowDate;
    }

    public function setBorrowDate(?\DateTimeInterface $borrowDate): self
    {
        $this->borrowDate = $borrowDate;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getReturnDate()
    {
        return $this->returnDate;
    }

    public function setReturnDate($returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    public function getConditionBeforeBorrow(): ?string
    {
        return $this->conditionBeforeBorrow;
    }

    public function setConditionBeforeBorrow(?string $conditionBeforeBorrow): self
    {
        $this->conditionBeforeBorrow = $conditionBeforeBorrow;

        return $this;
    }

    public function getConditionWhenReturned(): ?string
    {
        return $this->conditionWhenReturned;
    }

    public function setConditionWhenReturned(?string $conditionWhenReturned): self
    {
        $this->conditionWhenReturned = $conditionWhenReturned;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getLibrarian(): ?Librarian
    {
        return $this->librarian;
    }

    public function setLibrarian(?Librarian $librarian): self
    {
        $this->librarian = $librarian;

        return $this;
    }

    public function getPenalty(): ?Penalty
    {
        return $this->penalty;
    }

    public function setPenalty(?Penalty $penalty): self
    {
        $this->penalty = $penalty;

        return $this;
    }
}
