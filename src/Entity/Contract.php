<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContractRepository::class)
 */
class Contract
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class, inversedBy="contracts")
     */
    private $employee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rate;

    /**
     * @ORM\OneToMany(targetEntity=Allowance::class, mappedBy="contract")
     */
    private $allowances;

    /**
     * @ORM\OneToMany(targetEntity=Loan::class, mappedBy="contract")
     */
    private $loans;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="contract")
     */
    private $payments;

    public function __construct()
    {
        $this->allowances = new ArrayCollection();
        $this->loans = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(?float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return Collection|Allowance[]
     */
    public function getAllowances(): Collection
    {
        return $this->allowances;
    }

    public function addAllowance(Allowance $allowance): self
    {
        if (!$this->allowances->contains($allowance)) {
            $this->allowances[] = $allowance;
            $allowance->setContract($this);
        }

        return $this;
    }

    public function removeAllowance(Allowance $allowance): self
    {
        if ($this->allowances->removeElement($allowance)) {
            // set the owning side to null (unless already changed)
            if ($allowance->getContract() === $this) {
                $allowance->setContract(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Loan[]
     */
    public function getLoans(): Collection
    {
        return $this->loans;
    }

    public function addLoan(Loan $loan): self
    {
        if (!$this->loans->contains($loan)) {
            $this->loans[] = $loan;
            $loan->setContract($this);
        }

        return $this;
    }

    public function removeLoan(Loan $loan): self
    {
        if ($this->loans->removeElement($loan)) {
            // set the owning side to null (unless already changed)
            if ($loan->getContract() === $this) {
                $loan->setContract(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setContract($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getContract() === $this) {
                $payment->setContract(null);
            }
        }

        return $this;
    }
}
