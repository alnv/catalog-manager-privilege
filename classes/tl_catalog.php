<?php

namespace CMPrivilege;

use CatalogManager\Toolkit as Toolkit;
use CatalogManager\CatalogFieldBuilder as CatalogFieldBuilder;

class tl_catalog extends \Backend {


    public function getCatalogFields( \DataContainer $dc ) {

        $arrReturn = [];
        $strTablename = $dc->activeRecord->tablename;

        if ( Toolkit::isEmpty( $strTablename ) ) return $arrReturn;

        $objFieldBuilder = new CatalogFieldBuilder();
        $objFieldBuilder->initialize( $strTablename );

        $arrFields = $objFieldBuilder->getCatalogFields( true, null, false, false );

        foreach ( $arrFields as $strFieldname => $arrField ) {

            if ( !Toolkit::isDcConformField( $arrField ) ) continue;

            if ( in_array( $arrField['type'], [ 'upload' ] ) ) continue;

            $arrReturn[ $strFieldname ] = Toolkit::getLabelValue( $arrField['_dcFormat']['label'], $strFieldname );
        }

        return $arrReturn;
    }
}