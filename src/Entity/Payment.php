<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $ppestart;

    /**
     * @ORM\Column(type="date")
     */
    private $ppeend;

    /**
     * @ORM\Column(type="float")
     */
    private $tax;

    /**
     * @ORM\ManyToOne(targetEntity=Contract::class, inversedBy="payments")
     */
    private $contract;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPpestart(): ?\DateTimeInterface
    {
        return $this->ppestart;
    }

    public function setPpestart(\DateTimeInterface $ppestart): self
    {
        $this->ppestart = $ppestart;

        return $this;
    }

    public function getPpeend(): ?\DateTimeInterface
    {
        return $this->ppeend;
    }

    public function setPpeend(\DateTimeInterface $ppeend): self
    {
        $this->ppeend = $ppeend;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(float $tax): self
    {
        $this->tax = $tax;

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
