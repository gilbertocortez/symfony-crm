<?php

namespace App\Entity;

use App\Repository\LeadsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LeadsRepository::class)
 */
class Leads
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $eID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $zipCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $companyDivision;

    /**
     * @ORM\Column(type="integer")
     */
    private $leadStatus;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $saleAmount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salesperson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $leadSource;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModified;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEID(): ?int
    {
        return $this->eID;
    }

    public function setEID(?int $eID): self
    {
        $this->eID = $eID;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCompanyDivision(): ?int
    {
        return $this->companyDivision;
    }

    public function setCompanyDivision(int $companyDivision): self
    {
        $this->companyDivision = $companyDivision;

        return $this;
    }

    public function getLeadStatus(): ?int
    {
        return $this->leadStatus;
    }

    public function setLeadStatus(int $leadStatus): self
    {
        $this->leadStatus = $leadStatus;

        return $this;
    }

    public function getSaleAmount(): ?string
    {
        return $this->saleAmount;
    }

    public function setSaleAmount(string $saleAmount): self
    {
        $this->saleAmount = $saleAmount;

        return $this;
    }

    public function getSalesperson(): ?string
    {
        return $this->salesperson;
    }

    public function setSalesperson(?string $salesperson): self
    {
        $this->salesperson = $salesperson;

        return $this;
    }

    public function getLeadSource(): ?string
    {
        return $this->leadSource;
    }

    public function setLeadSource(?string $leadSource): self
    {
        $this->leadSource = $leadSource;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }
}
