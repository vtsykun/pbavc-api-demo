<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use ApiPlatform\Core\Util\ReflectionClassRecursiveIterator;
use App\Annotation\OroResource;
use App\DataProvider\OroCRMCollectionDataProvider;
use Doctrine\Common\Annotations\Reader;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class AnnotationOroCRMModelPass implements CompilerPassInterface
{
    /**
     * @var array
     */
    private $resourceClassDirectories;

    /**
     * @param array $resourceClassDirectories
     */
    public function __construct(array $resourceClassDirectories)
    {
        $this->resourceClassDirectories = $resourceClassDirectories;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        /** @var Reader */
        $reader = $container->get('annotation_reader');

        $resourceClasses = [];
        foreach (ReflectionClassRecursiveIterator::getReflectionClassesFromDirectories($this->resourceClassDirectories) as $className => $reflectionClass) {
            if ($resource = $reader->getClassAnnotation($reflectionClass, OroResource::class)) {
                $resourceClasses[$className] = $resource->toArray();
            }
        }

        $container->getDefinition(OroCRMCollectionDataProvider::class)
            ->replaceArgument(0, $resourceClasses);
    }
}
