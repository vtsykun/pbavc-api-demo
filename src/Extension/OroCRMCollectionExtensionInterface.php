<?php

declare(strict_types=1);

namespace App\Extension;

use Doctrine\Common\Collections\Collection;

interface OroCRMCollectionExtensionInterface
{
    /**
     * @param Collection $params
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     */
    public function applyToCollection(Collection $params, string $resourceClass, ?string $operationName, array $context = []): void;
}
