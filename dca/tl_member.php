<?php

$GLOBALS['TL_DCA']['tl_member']['palettes']['default'] .= ';{privilege_settings},ownerType';

$GLOBALS['TL_DCA']['tl_member']['fields']['ownerType'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_member']['ownerType'],
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