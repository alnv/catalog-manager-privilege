<?php

$GLOBALS['TL_DCA']['tl_user']['palettes']['admin'] .= ';{privilege_settings},ownerType';
$GLOBALS['TL_DCA']['tl_user']['palettes']['group'] .= ';{privilege_settings},ownerType';
$GLOBALS['TL_DCA']['tl_user']['palettes']['login'] .= ';{privilege_settings},ownerType';
$GLOBALS['TL_DCA']['tl_user']['palettes']['custom'] .= ';{privilege_settings},ownerType';
$GLOBALS['TL_DCA']['tl_user']['palettes']['extend'] .= ';{privilege_settings},ownerType';
$GLOBALS['TL_DCA']['tl_user']['palettes']['default'] .= ';{privilege_settings},ownerType';

$GLOBALS['TL_DCA']['tl_user']['fields']['ownerType'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_user']['ownerType'],
    'inputType' => 'radio',

    'eval' => [

        'doNotCopy' => true,
        'blankOptionLabel' => '-',
        'includeBlankOption' => true
    ],

    'options_callback' => [ 'CMPrivilege\tl_user', 'getOwnerTypes' ],

    'exclude' => true,
    'sql' => "blob NULL"
];