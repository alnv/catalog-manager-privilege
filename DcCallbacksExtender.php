<?php

namespace CMPrivilege;

use CatalogManager\CatalogFieldBuilder as CatalogFieldBuilder;

class DcCallbacksExtender extends \Backend {


    public function showOnlyOwnedEntitiesInBackend( $strTable ) {

        if ( !$strTable ) return null;

        $objFieldBuilder = new CatalogFieldBuilder();
        $objFieldBuilder->initialize( $strTable );
        $arrCatalog = $objFieldBuilder->getCatalog();

        if ( $arrCatalog['ownerType'] != 'BE' ) return null;
        if ( !$arrCatalog['showOnlyOwnedEntities'] ) return null;

        $this->import( 'BackendUser', 'User' );

        $GLOBALS['TL_DCA'][ $strTable ]['list']['sorting']['filter'][] = [ sprintf( '%s=?', $arrCatalog['ownerField'] ), $this->User->id ];
    }


    public function showOnlyOwnedEntitiesInFrontend( $arrQuery, $objCatalogView ) {

        $arrCatalog = $objCatalogView->getCatalog();

        if ( $arrCatalog['ownerType'] != 'FE' ) return $arrQuery;
        if ( !$arrCatalog['showOnlyOwnedEntities'] ) return $arrQuery;

        $this->import( 'FrontendUser', 'User' );

        $arrQuery['where'][] = [

            'operator' => 'equal',
            'field' => $arrCatalog['ownerField'],
            'value' => $this->User->id ? $this->User->id : 0
        ];

        return $arrQuery;
    }


    public function callPrivilegeCallback( \DataContainer $dc ) {

        if ( isset( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInBackend'] ) && is_array( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInBackend'] ) ) {

            $this->import( 'BackendUser', 'User' );

            $objFieldBuilder = new CatalogFieldBuilder();
            $objFieldBuilder->initialize( $dc->table );
            $arrCatalog = $objFieldBuilder->getCatalog();

            foreach ( $GLOBALS['TL_HOOKS']['catalogSetPrivilegesInBackend'] as $arrCallback )  {

                if ( is_array( $arrCallback ) ) {

                    $this->import( $arrCallback[0] );
                    $this->{$arrCallback[0]}->{$arrCallback[1]}( $dc->table, $arrCatalog, 'backend', $this->User->ownerType, $this->User, $dc );
                }
            }
        }
    }
}