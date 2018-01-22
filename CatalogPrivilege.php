<?php

namespace CMPrivilege;

use CatalogManager\CatalogFieldBuilder as CatalogFieldBuilder;

class CatalogPrivilege extends \Backend {


    public function addPrivilegeHookInBackend( $strTable ) {

        if ( !$strTable ) return null;

        $objFieldBuilder = new CatalogFieldBuilder();
        $objFieldBuilder->initialize( $strTable );

        $arrCatalog = $objFieldBuilder->getCatalog();

        if ( $arrCatalog['callPrivilegeCallback'] ) $GLOBALS['TL_DCA'][ $strTable ]['config']['onload_callback'][] = [ 'CMPrivilege\DcCallbacksExtender', 'callPrivilegeCallback' ];
    }


    public function addPrivilegeHookInFrontend( $objCatalogView ) {

        $arrCatalog = $objCatalogView->getCatalog();

        if ( !$arrCatalog['callPrivilegeCallback'] ) return null;

        if ( isset( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInFrontend'] ) && is_array( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInFrontend'] ) ) {

            $this->import( 'FrontendUser', 'User' );

            foreach ( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInFrontend'] as $arrCallback )  {

                if ( is_array( $arrCallback ) ) {

                    $this->import( $arrCallback[0] );
                    $this->{$arrCallback[0]}->{$arrCallback[1]}( $objCatalogView->catalogTablename, $arrCatalog, 'list', $this->User->ownerType, $this->User, $objCatalogView );
                }
            }
        }
    }


    public function addPrivilegeHookInFrontendEditing( $strTable, $arrCatalog, $arrCatalogFields, $arrValues, $objCatalogEditingView ) {

        if ( !$arrCatalog['callPrivilegeCallback'] ) return null;

        if ( isset( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInFrontend'] ) && is_array( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInFrontend'] ) ) {

            $this->import( 'FrontendUser', 'User' );

            foreach ( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInFrontend'] as $arrCallback )  {

                if ( is_array( $arrCallback ) ) {

                    $this->import( $arrCallback[0] );
                    $this->{$arrCallback[0]}->{$arrCallback[1]}( $strTable, $arrCatalog, 'form', $this->User->ownerType, $this->User, $objCatalogEditingView );
                }
            }
        }
    }
}