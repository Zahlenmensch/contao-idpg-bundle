<?php

/**
 * DCA configuration for the custom frontend module "SplitNavigation".
 * This module extends Contao's navigation module and allows injecting
 * an article between two navigation blocks.
 *
 * The palette and field definitions ensure correct backend rendering
 * and data handling.
 */

// Register a new palette for the module type "SplitNavigation"
$GLOBALS['TL_DCA']['tl_module']['palettes']['SplitNavigation'] =
    '{title_legend},name,headline,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected;{article_legend},headerArticleAlias;{template_legend},customTpl;{expert_legend:hide},guests,cssID,space';

// Define the custom field "headerArticleAlias" used to inject an article between navigation blocks
$GLOBALS['TL_DCA']['tl_module']['fields']['headerArticleAlias'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['headerArticleAlias'], // Label and description from language file
    'exclude'   => true,                                                    // Exclude from search and export
    'inputType' => 'text',                                                  // Simple text input
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],               // Max length and CSS class for layout
    'sql'       => "varchar(255) NOT NULL default ''"                       // Database definition
];