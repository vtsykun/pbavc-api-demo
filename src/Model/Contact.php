<?php

declare(strict_types=1);

namespace App\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Annotation\OroResource;

/**
 * @ApiResource
 * @OroResource(uri="contacts.json")
 */
class Contact implements OroCRMModel
{
    /**
     * @ApiProperty(identifier=true)
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
        $self->firstName = $body['firstName'];
        $self->lastName = $body['lastName'];
        $self->identificationNumber = $body['identificationNumber'];
        $self->identificationType = $body['identificationNumber'];
        $self->createdAt = $body['createdAt'] ? new \DateTime($body['createdAt']) : null;
        $self->emails = $body['emails'] ? array_map([ContactEmail::class, 'fromRequest'], $body['emails']) : [];

        return $self;
    }
}
