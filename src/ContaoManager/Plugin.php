<?php

namespace Zahlenmensch\ContaoIdpgBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Zahlenmensch\ContaoIdpgBundle\ContaoIdpgBundle;

/**
 * Registers the ContaoIdpgBundle with the Contao Manager.
 *
 * This plugin tells the Contao Manager how and when to load the bundle.
 * It ensures that the bundle is loaded after the Contao core bundle,
 * which guarantees that all core services and dependencies are available.
 */
class Plugin implements BundlePluginInterface
{
    /**
     * Returns the bundle configuration to the Contao Manager.
     *
     * @param ParserInterface $parser The bundle parser provided by Contao
     *
     * @return array An array of BundleConfig objects
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            // Register the bundle and ensure it loads after the Contao core
            BundleConfig::create(ContaoIdpgBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}