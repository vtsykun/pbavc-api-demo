<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Util\OroClient;

final class OroCRMItemDataProvider implements RestrictedDataProviderInterface, ItemDataProviderInterface
{
    private $resourceClasses;
    private $client;

    /**
     * @param array $resourceClasses
     */
    public function __construct(array $resourceClasses)
    {
        $this->resourceClasses = $resourceClasses;
        $this->client = OroClient::create();
    }

    /**
     * {@inheritdoc}
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return isset($this->resourceClasses[$resourceClass]);
    }

    /**
     * {@inheritdoc}
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        $config = $this->resourceClasses[$resourceClass];
        $uri = str_replace('{id}', $id, $config['get']);
        $data = $this->client->execute($uri, 'GET');

        $data = $resourceClass::{'fromRequest'}($data);
        return $data;
    }
}
