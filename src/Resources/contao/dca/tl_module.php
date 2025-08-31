<?php

/**
 * DCA configuration for the custom frontend module "split_navigation".
 * This module extends Contao's navigation module and allows injecting
 * an article between two navigation blocks.
 */

// Register a new palette for the module type "split_navigation"
$GLOBALS['TL_DCA']['tl_module']['palettes']['split_navigation'] =
    '{title_legend},name,headline,type;{navigation_legend},levelOffset,showLevel,hardLimit,showProtected,defineRoot,rootPage;{article_legend},headerArticleAlias;{template_legend:hide},navigationTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

// Define the custom field "headerArticleAlias" used to inject an article between navigation blocks
$GLOBALS['TL_DCA']['tl_module']['fields']['headerArticleAlias'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['headerArticleAlias'], // Label and description from language file
    'exclude'   => true,                                                    // Exclude from search and export
    'inputType' => 'text',                                                  // Simple text input
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],               // Max length and CSS class for layout
    'sql'       => "varchar(255) NOT NULL default ''"                       // Database definition
];