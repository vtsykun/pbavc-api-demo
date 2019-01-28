<?php

namespace App\Extension;

use Doctrine\Common\Collections\Collection;

final class PageCollectionExtension implements OroCRMCollectionExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function applyToCollection(Collection $params, string $resourceClass, ?string $operationName, array $context = []): void
    {
        if (isset($context['filters']['page'])) {
            $params->set('page', (int) $context['filters']['page']);
        }
    }
}
