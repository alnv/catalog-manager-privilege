<?php

ClassLoader::addNamespace( 'CMPrivilege' );

ClassLoader::addClasses([

    'CMPrivilege\DcCallbacksExtender' => 'system/modules/catalog-manager-privilege/DcCallbacksExtender.php',
    'CMPrivilege\CatalogPrivilege' => 'system/modules/catalog-manager-privilege/CatalogPrivilege.php',
    'CMPrivilege\tl_catalog' => 'system/modules/catalog-manager-privilege/classes/tl_catalog.php',
    'CMPrivilege\tl_user' => 'system/modules/catalog-manager-privilege/classes/tl_user.php'
]);