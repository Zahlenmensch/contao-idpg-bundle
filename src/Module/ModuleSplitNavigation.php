<?php

namespace Zahlenmensch\ContaoIdpgBundle\Module;

use Contao\ModuleNavigation;
use Contao\System;

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
     *
     * @var string
     */
    protected $strTemplate = 'mod_splitnavigation_idpg';

    /**
     * Generates the navigation and injects the article alias into the template.
     */
    protected function compile(): void
    {
        // Generate the navigation items using the parent logic
        parent::compile();

        // Pass the configured article alias to the template
        $this->Template->headerArticleAlias = $this->headerArticleAlias;
    }
}