<?php

namespace Zahlenmensch\ContaoIdpgBundle\Module;

use Contao\ModuleNavigation;

/**
 * Custom navigation module that splits the navigation into two blocks
 * and injects an article (e.g. logo or content element) between them.
 *
 * This module extends Contao's ModuleNavigation and uses a custom template.
 */
class ModuleSplitNavigation extends ModuleNavigation
{
    /**
     * The name of the custom template used to render the navigation.
     * This template must exist under: src/Resources/contao/templates/frontend_module/
     *
     * @var string
     */
    protected $strTemplate = 'mod_splitnavigation_idpg';

    /**
     * Compiles the module output.
     * This method is called automatically by Contao and is responsible
     * for preparing all variables passed to the template.
     */
    protected function compile(): void
    {
        // ✅ Generate the navigation items using Contao's core logic
        $items = $this->renderNavigation();

        // ✅ Pass the navigation items to the template
        $this->Template->items = $items;

        // ✅ Pass the configured article alias to the template
        // This allows your Twig template to insert the article between navigation blocks
        $this->Template->headerArticleAlias = $this->headerArticleAlias;
    }
}