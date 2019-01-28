<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactEmailRepository")
 * @ORM\Table(
 *      name="cuantic_contact_email",
 *      indexes={
 *          @ORM\Index(name="contact_email_email_idx",columns={"email"}),
 *      }
 * )
 */
class ContactEmail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPrimary;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $optin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact", inversedBy="emails")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    public function setIsPrimary(?bool $isPrimary): self
    {
        $this->isPrimary = $isPrimary;

        return $this;
    }

    public function getOptin(): ?bool
    {
        return $this->optin;
    }

    public function setOptin(?bool $optin): self
    {
        $this->optin = $optin;

        return $this;
    }

    public function getOwner(): ?Contact
    {
        return $this->owner;
    }

    public function setOwner(?Contact $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
