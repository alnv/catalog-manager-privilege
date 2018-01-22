<?php

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{privilege_settings},catalogOwnerTypes';

$GLOBALS['TL_DCA']['tl_settings']['fields']['catalogOwnerTypes'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_settings']['catalogOwnerTypes'],
    'inputType' => 'keyValueWizard',

    'eval' => [

        'tl_class' => 'clr',
    ],

    'exclude' => true
];