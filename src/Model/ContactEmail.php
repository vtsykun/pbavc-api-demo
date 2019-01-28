<?php

declare(strict_types=1);

namespace App\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(
 *     shortName="Email"
 * )
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
        $self->valid = $request['status'] === 'valid';

        return $self;
    }

    /**
     * {@inheritdoc}
     */
    public function toRequest(): array
    {
        return [
            'email' => $this->email,
            'status' => $this->valid ? 'valid' : null,
            'primary' => $this->primary
        ];
    }

    /**
     * @return int|null
     */
    public function identifier(): ?int
    {
        return $this->id;
    }
}
