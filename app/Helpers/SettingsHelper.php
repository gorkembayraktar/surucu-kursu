<?php

namespace App\Helpers;

use App\Models\Settings;

class SettingsHelper
{
    private $_data = [];

    public function __construct(){
        $data = Settings::where('autoload', true)->get();
        foreach($data as $item):
            $this->_data[ $item->key ] = $item->value;
        endforeach;
    }
    public function get( $key ){
        if( isset($this->_data[ $key ]) )
            return $this->_data[ $key ];
        
        $first = Settings::where('key', $key)->first();

        if($first){
            $this->_data[ $first->key ] = $first->value;
            return $first->value;
        }
        return null;
    }
}