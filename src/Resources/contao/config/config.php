<?php

/**
 * Register custom frontend modules for Contao.
 *
 * This file defines the module type "split_navigation" and links it to
 * the corresponding PHP class. The module will appear in the backend
 * under the category "idpg" and can be selected when creating a new module.
 */

$GLOBALS['FE_MOD']['navigation']['split_navigation'] = 'Zahlenmensch\ContaoIdpgBundle\Module\ModuleSplitNavigation';