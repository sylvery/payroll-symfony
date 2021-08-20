<?php

namespace App\Entity;

use App\Repository\LoanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoanRepository::class)
 */
class Loan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="float")
     */
    private $rate;

    /**
     * @ORM\OneToMany(targetEntity=Deduction::class, mappedBy="loan")
     */
    private $deductions;

    /**
     * @ORM\ManyToOne(targetEntity=Contract::class, inversedBy="loans")
     */
    private $contract;

    public function __construct()
    {
        $this->deductions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return Collection|Deduction[]
     */
    public function getDeductions(): Collection
    {
        return $this->deductions;
    }

    public function addDeduction(Deduction $deduction): self
    {
        if (!$this->deductions->contains($deduction)) {
            $this->deductions[] = $deduction;
            $deduction->setLoan($this);
        }

        return $this;
    }

    public function removeDeduction(Deduction $deduction): self
    {
        if ($this->deductions->removeElement($deduction)) {
            // set the owning side to null (unless already changed)
            if ($deduction->getLoan() === $this) {
                $deduction->setLoan(null);
            }
        }

        return $this;
    }

    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    public function setContract(?Contract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }
}
