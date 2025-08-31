<?php

declare(strict_types=1);

namespace Zahlenmensch\ContaoIdpgBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Loads and manages the bundle's service configuration.
 *
 * This class is automatically called by Symfony during the container compilation process.
 * It loads service definitions from YAML files and can be extended to include additional configuration.
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
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        // Load the service definitions from services.yaml
        $loader->load('services.yaml');

        // Optional: Load additional configuration files if needed
        // $loader->load('parameters.yaml');
        // $loader->load('events.yaml');
    }
}