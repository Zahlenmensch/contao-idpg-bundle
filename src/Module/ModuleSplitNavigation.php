<?php

namespace Zahlenmensch\ContaoIdpgBundle\Module;

use Contao\ModuleNavigation;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Custom frontend module that extends Contao's default navigation module.
 * This module splits the navigation into two parts and allows injecting
 * custom content (e.g. a logo or article) between them.
 *
 * It supports configuration options such as start level, stop level,
 * hard limit, and visibility of protected pages.
 */
class ModuleSplitNavigation extends ModuleNavigation
{
    /**
     * The default template used to render this module.
     * Contao will automatically resolve .html.twig if available.
     *
     * @var string
     */
    protected $strTemplate = 'mod_splitnavigation_idpg';

    /**
     * Translator service injected via services.yaml.
     * Used for translating strings in the frontend.
     */
    private TranslatorInterface $translator;

    /**
     * Setter method for the translator service.
     * This is automatically called by Symfony's service container.
     *
     * @param TranslatorInterface $translator
     */
    public function setTranslator(TranslatorInterface $translator): void
    {
        $this->translator = $translator;
    }

    /**
     * Returns the root page ID for the current page context.
     * This method is used to determine the starting point of the navigation tree.
     *
     * @return int
     */
    public function getRootPageId(): int
    {
        // Use the configured root page if available, otherwise fallback to the current page's root ID.
        return $this->rootPage ?: $GLOBALS['objPage']->rootId;
    }

    /**
     * Prepares the module output and passes data to the template.
     * This method is automatically called by Contao when rendering the module.
     * It builds the navigation tree and injects additional frontend data.
     */
    protected function compile(): void
    {
        // Retrieve navigation settings from the backend module configuration.
        $startLevel    = $this->levelOffset   ?? 0;     // Starting level of the navigation tree
        $stopLevel     = $this->showLevel     ?? 0;     // Maximum depth of the navigation tree
        $hardLimit     = $this->hardLimit     ?? false; // If true, navigation stops strictly at stopLevel
        $showProtected = $this->showProtected ?? false; // If false, protected pages will be excluded

        // Get the root page ID for the current page context.
        $rootId = $this->getRootPageId();

        // Fetch the navigation items using Contao's built-in method.
        // This method is inherited from ModuleNavigation and returns an array of navigation items.
        $items = parent::getNavigation($rootId, $startLevel, $hardLimit, $stopLevel);

        // Optionally filter out protected pages if the setting is disabled.
        // This ensures that pages marked as "protected" are not shown to guests.
        if (!$showProtected) {
            $items = array_filter($items, static function ($item) {
                return empty($item['protected']);
            });
        }

        // Pass the final navigation items to the template.
        // These items will be rendered in the frontend using the assigned Twig template.
        $this->Template->items = $items;

        // Pass the article alias to the template (if defined in DCA).
        // This allows injecting a specific article between navigation blocks.
        $this->Template->headerArticleAlias = $this->headerArticleAlias ?? '';

        // Example usage of translator (optional):
        // You can use this to translate labels or dynamic content in the template.
        // $this->Template->headline = $this->translator->trans('my_custom_label');
    }
}