<?php

/**
 * DCA configuration for the custom frontend module "split_navigation".
 * This module extends Contao's navigation module and adds a custom field
 * to inject an article between two navigation blocks.
 */

// Extend the existing palette "navigation" for your custom module type
$GLOBALS['TL_DCA']['tl_module']['palettes']['split_navigation'] =
    $GLOBALS['TL_DCA']['tl_module']['palettes']['navigation'] . ';{article_legend},headerArticleAlias';

// Define the custom field "headerArticleAlias"
$GLOBALS['TL_DCA']['tl_module']['fields']['headerArticleAlias'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['headerArticleAlias'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];