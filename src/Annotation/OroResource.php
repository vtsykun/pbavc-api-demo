<?php

declare(strict_types=1);

namespace App\Annotation;

/**
 * @Annotation
 * @Target({"CLASS"})
 * @Attributes(
 *     @Attribute("uri", type="string")
 * )
 */
class OroResource
{
    /**
     * @var string
     */
    public $uri;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'uri' => $this->uri
        ];
    }
}
