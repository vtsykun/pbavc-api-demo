<?php

declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Extension\OroCRMCollectionExtensionInterface;
use App\Util\OroClient;
use Doctrine\Common\Collections\ArrayCollection;

final class OroCRMCollectionDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $resourceClasses;
    private $collectionExtensions;
    private $client;

    /**
     * @param array $resourceClasses
     * @param iterable|OroCRMCollectionExtensionInterface[] $collectionExtensions
     */
    public function __construct(array $resourceClasses, iterable $collectionExtensions = [])
    {
        $this->collectionExtensions = $collectionExtensions;
        $this->resourceClasses = $resourceClasses;
        $this->client = OroClient::create();
    }

    /**
     * {@inheritdoc}
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $params = new ArrayCollection();
        foreach ($this->collectionExtensions as $extension) {
            $extension->applyToCollection($params, $resourceClass, $operationName, $context);
        }

        $config = $this->resourceClasses[$resourceClass];
        $uri = $config['uri'] . '?' . http_build_query($params->toArray());
        $data = $this->client->execute($uri, strtoupper($operationName));

        $data = array_map([$resourceClass, 'fromRequest'], $data);
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return isset($this->resourceClasses[$resourceClass]);
    }
}
