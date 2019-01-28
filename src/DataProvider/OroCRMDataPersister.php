<?php

declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Model\OroCRMModel;
use App\Util\OroClient;

final class OroCRMDataPersister implements DataPersisterInterface
{
    private $client;
    private $resourceClasses;

    public function __construct(array $resourceClasses)
    {
        $this->resourceClasses = $resourceClasses;
        $this->client = OroClient::create();
    }

    /**
     * {@inheritdoc}
     */
    public function supports($data): bool
    {
        return $data instanceof OroCRMModel && isset($this->resourceClasses[get_class($data)]); //No proxy
    }

    /**
     * {@inheritdoc}
     * @param OroCRMModel $data
     */
    public function persist($data)
    {
        // Send post
    }

    /**
     * {@inheritdoc}
     * @param OroCRMModel $data
     */
    public function remove($data)
    {
        $config = $this->resourceClasses[get_class($data)];
        $uri = str_replace('{id}', $data->getIdentifier(), $config['get']);

        $this->client->execute($uri, 'DELETE');
    }
}
