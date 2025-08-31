<?php

namespace Zahlenmensch\ContaoIdpgBundle\Module;

use Contao\ModuleNavigation;

/**
 * Custom navigation module that splits the navigation into two blocks
 * and injects an article (e.g. logo or content element) between them.
 *
 * This module extends Contao's ModuleNavigation and behaves identically,
 * except for passing an additional variable to the template.
 */
class ModuleSplitNavigation extends ModuleNavigation
{
    /**
     * The name of the custom template used to render the navigation.
     * This template must exist under:
     * src/Resources/contao/templates/frontend_module/mod_splitnavigation_idpg.html.twig
     *
     * @var string
     */
    protected $strTemplate = 'mod_splitnavigation_idpg';

    /**
     * Compiles the module output.
     * This method is called automatically by Contao and is responsible
     * for preparing all variables passed to the template.
     *
     * By calling parent::compile(), we inherit all standard navigation logic:
     * - Navigation tree generation
     * - Level offset, root page, protected pages
     * - Subnavigation rendering
     * - Automatic population of $this->Template->items
     *
     * We then add our custom variable: headerArticleAlias
     */
    protected function compile(): void
    {
        // Use Contao's built-in navigation logic
        parent::compile();

        // Add custom variable to the template
        // This allows the Twig template to insert an article via InsertTag
        $this->Template->headerArticleAlias = $this->headerArticleAlias;
    }
}