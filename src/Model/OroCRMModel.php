<?php

declare(strict_types=1);

namespace App\Model;

interface OroCRMModel
{
    /**
     * @param array $request
     * @return self
     */
    public static function fromRequest(array $request);

    /**
     * {@inheritdoc}
     */
    public function toRequest(): array;

    /**
     * @return int|null
     */
    public function identifier(): ?int;
}
