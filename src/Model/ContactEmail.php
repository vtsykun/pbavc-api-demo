<?php

namespace App\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource
 */
class ContactEmail implements OroCRMModel
{
    /**
     * @ApiProperty(identifier=true)
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var bool
     */
    public $primary;

    /**
     * @var bool
     */
    public $valid;

    /**
     * {@inheritdoc}
     */
    public static function fromRequest(array $request)
    {
        $self = new self();

        $self->id = $request['id'] ?? 0;
        $self->email = $request['email'] ?? null;
        $self->primary = $request['primary'] ?? false;
        return $self;
    }
}
