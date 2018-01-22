<?php

namespace CMPrivilege;

class tl_user extends \Backend {


    public function getOwnerTypes() {

        $arrReturn = [];
        $arrOnwerTypes = deserialize( \Config::get( 'catalogOwnerTypes' ) );

        if ( is_array( $arrOnwerTypes ) && !empty( $arrOnwerTypes ) ) {

            foreach ( $arrOnwerTypes as $arrOwnerType ) {

                $arrReturn[ $arrOwnerType['key'] ] = $arrOwnerType['value'];
            }
        }

        return $arrReturn;
    }
}