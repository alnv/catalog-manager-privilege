<?php

$GLOBALS['TL_HOOKS']['loadDataContainer'][] = [ 'CMPrivilege\CatalogPrivilege', 'addPrivilegeHookInBackend' ];
$GLOBALS['TL_HOOKS']['catalogManagerInitializeView'][] = [ 'CMPrivilege\CatalogPrivilege', 'addPrivilegeHookInFrontend' ];
$GLOBALS['TL_HOOKS']['catalogManagerInitializeFrontendEditing'][] = [ 'CMPrivilege\CatalogPrivilege', 'addPrivilegeHookInFrontendEditing' ];

$GLOBALS['TL_HOOKS']['loadDataContainer'][] = [ 'CMPrivilege\DcCallbacksExtender', 'showOnlyOwnedEntitiesInBackend' ];
$GLOBALS['TL_HOOKS']['catalogManagerViewQuery'][] = [ 'CMPrivilege\DcCallbacksExtender', 'showOnlyOwnedEntitiesInFrontend' ];
$GLOBALS['TL_HOOKS']['catalogManagerFrontendEditingQuery'][] = [ 'CMPrivilege\DcCallbacksExtender', 'showOnlyOwnedEntitiesInFrontend' ];