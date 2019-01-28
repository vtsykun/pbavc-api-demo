<?php

declare(strict_types=1);

namespace App\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Annotation\OroResource;

/**
 * @ApiResource()
 * @OroResource(cget="contacts.json", get="contacts/{id}.json")
 */
class Contact implements OroCRMModel
{
    /**
     * @ApiProperty(identifier=true)
     * @Groups({"contact"})
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $identificationType;

    /**
     * @var integer
     */
    public $identificationNumber;

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var array|ContactEmail[]
     */
    public $emails;

    /**
     * {@inheritdoc}
     */
    public static function fromRequest(array $body)
    {
        $self = new self();

        $self->id = $body['id'];
        $self->firstName = $body['firstName'] ?? null;
        $self->lastName = $body['lastName'] ?? null;
        $self->identificationNumber = $body['identificationNumber'] ?? null;
        $self->identificationType = $body['identificationType'] ?? null;
        $self->createdAt = isset($body['createdAt']) ? new \DateTime($body['createdAt']) : null;
        $self->emails = isset($body['emails']) && $body['emails']
            ? array_map([ContactEmail::class, 'fromRequest'], $body['emails']) : [];

        return $self;
    }

    /**
     * {@inheritdoc}
     */
    public function toRequest(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'identificationNumber' => $this->identificationNumber,
            'identificationType' => $this->identificationType
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function identifier(): ?int
    {
        return $this->id;
    }
}
