<?php

declare(strict_types=1);

namespace App\Annotation;

/**
 * @Annotation
 * @Target({"CLASS"})
 * @Attributes(
 *     @Attribute("cget", type="string"),
 *     @Attribute("get", type="string"),
 * )
 */
class OroResource
{
    /**
     * @var string
     */
    public $cget;

    /**
     * @var string
     */
    public $get;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cget' => $this->cget,
            'get' => $this->get
        ];
    }
}
