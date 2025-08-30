<?php

// Palette für dein Modul "SplitNavigation" mit dem neuen Alias-Feld
$GLOBALS['TL_DCA']['tl_module']['palettes']['SplitNavigation'] =
    '{title_legend},name,headline,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected;{article_legend},headerArticleAlias;{template_legend},customTpl;{expert_legend:hide},guests,cssID,space';

// Neues Eingabefeld für den Artikel-Alias
$GLOBALS['TL_DCA']['tl_module']['fields']['headerArticleAlias'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['headerArticleAlias'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];