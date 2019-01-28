<?php

namespace App\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Annotation\OroResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     shortName="Case",
 *     normalizationContext={"groups"={"contact", "default"}}
 * )
 * @OroResource(cget="/cases.json", get="/cases/{id}.json")
 */
class CaseEntity implements OroCRMModel
{
    /**
     * @ApiProperty(identifier=true)
     * @Groups("default")
     * @var int
     */
    public $id;

    /**
     * @var string
     * @Groups("default")
     */
    public $firstName;

    /**
     * @var string
     * @Groups("default")
     */
    public $lastName;

    /**
     * @var \DateTime
     * @Groups("default")
     */
    public $createdAt;

    /**
     * @var string
     * @Groups("default")
     */
    public $reason;

    /**
     * @var object
     * @Groups("contact")
     */
    public $relatedContact;

    /**
     * @param array $request
     * @return self
     */
    public static function fromRequest(array $request)
    {
        $self = new self();
        $self->id = $request['id'];
        $self->firstName = $request['firstName'] ?? null;
        $self->lastName = $request['lastName'] ?? null;
        $self->createdAt = isset($request['createdAt']) ? new \DateTime($request['createdAt']) : null;
        $self->reason = $request['reason'] ?? null;
        $self->relatedContact = isset($request['relatedContact']) ? Contact::fromRequest(['id' => $request['relatedContact']]) : null;
        return $self;
    }

    /**
     * {@inheritdoc}
     */
    public function toRequest(): array
    {
        return [
            'reason' => $this->reason
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
