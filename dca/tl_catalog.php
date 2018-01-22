<?php

$GLOBALS['TL_DCA']['tl_catalog']['subpalettes']['usePrivileges'] = 'ownerType,ownerField,showOnlyOwnedEntities,callPrivilegeCallback';
$GLOBALS['TL_DCA']['tl_catalog']['palettes']['__selector__'][] = 'usePrivileges';

$GLOBALS['TL_DCA']['tl_catalog']['palettes']['default'] = str_replace( 'isBackendModule;', 'isBackendModule;{privilege_settings},usePrivileges;', $GLOBALS['TL_DCA']['tl_catalog']['palettes']['default'] );
$GLOBALS['TL_DCA']['tl_catalog']['palettes']['modifier'] = str_replace( 'format;', 'format;{privilege_settings},usePrivileges,callPrivilegeCallback;', $GLOBALS['TL_DCA']['tl_catalog']['palettes']['modifier'] );

$GLOBALS['TL_DCA']['tl_catalog']['fields']['usePrivileges'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_catalog']['usePrivileges'],
    'inputType' => 'checkbox',

    'eval' => [

        'submitOnChange' => true,
        'doNotCopy' => true,
        'tl_class' => 'clr'
    ],

    'exclude' => true,
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_catalog']['fields']['callPrivilegeCallback'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_catalog']['callPrivilegeCallback'],
    'inputType' => 'checkbox',

    'eval' => [

        'tl_class' => 'w50',
        'doNotCopy' => true
    ],

    'exclude' => true,
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_catalog']['fields']['showOnlyOwnedEntities'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_catalog']['showOnlyOwnedEntities'],
    'inputType' => 'checkbox',

    'eval' => [

        'tl_class' => 'w50',
        'doNotCopy' => true
    ],

    'exclude' => true,
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_catalog']['fields']['ownerField'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_catalog']['ownerField'],
    'inputType' => 'select',

    'eval' => [

        'chosen' => true,
        'tl_class' => 'w50',
        'mandatory' => true,
        'doNotCopy' => true,
        'blankOptionLabel' => '-',
        'includeBlankOption' => true
    ],

    'options_callback' => [ 'CMPrivilege\tl_catalog', 'getCatalogFields' ],

    'exclude' => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_catalog']['fields']['ownerType'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_catalog']['ownerType'],
    'inputType' => 'select',
    'default' => 'FE',

    'eval' => [

        'tl_class' => 'w50',
        'mandatory' => true,
        'doNotCopy' => true
    ],

    'options' => [ 'FE', 'BE' ],

    'exclude' => true,
    'sql' => "char(2) NOT NULL default ''"
];