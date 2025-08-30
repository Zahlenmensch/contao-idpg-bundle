<?php

namespace Zahlenmensch\ContaoIdpgBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Zahlenmensch\ContaoIdpgBundle\ContaoIdpgBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoIdpgBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}