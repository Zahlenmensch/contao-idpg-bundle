<?php

declare(strict_types=1);

namespace Zahlenmensch\ContaoIdpgBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * This class is responsible for loading and managing the bundle's service configuration.
 * It is automatically called by Symfony during the container compilation process.
 */
class ContaoIdpgExtension extends Extension
{
    /**
     * Loads service definitions from a YAML configuration file.
     *
     * @param array $configs    The merged configuration array from all sources
     * @param ContainerBuilder $container The Symfony service container
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        // Create a YAML file loader with the path to the bundle's configuration directory
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        // Load the service definitions from services.yaml
        $loader->load('services.yaml');
    }
}