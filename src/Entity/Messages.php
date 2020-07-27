<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagesRepository::class)
 */
class Messages
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
    private $leadId;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="integer")
     */
    private $messageType;

    /**
     * @ORM\Column(type="integer")
     */
    private $messageStatus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $messageOrigin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_modified;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeadId(): ?int
    {
        return $this->leadId;
    }

    public function setLeadId(?int $leadId): self
    {
        $this->leadId = $leadId;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getMessageType(): ?int
    {
        return $this->messageType;
    }

    public function setMessageType(int $messageType): self
    {
        $this->messageType = $messageType;

        return $this;
    }

    public function getMessageStatus(): ?int
    {
        return $this->messageStatus;
    }

    public function setMessageStatus(int $messageStatus): self
    {
        $this->messageStatus = $messageStatus;

        return $this;
    }

    public function getMessageOrigin(): ?string
    {
        return $this->messageOrigin;
    }

    public function setMessageOrigin(?string $messageOrigin): self
    {
        $this->messageOrigin = $messageOrigin;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->date_created;
    }

    public function setDateCreated(\DateTimeInterface $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->date_modified;
    }

    public function setDateModified(\DateTimeInterface $date_modified): self
    {
        $this->date_modified = $date_modified;

        return $this;
    }
}
