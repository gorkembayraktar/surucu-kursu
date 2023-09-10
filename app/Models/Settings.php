<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['key', 'value', 'autoload'];

    private $_data = [];

    public function get( $key ){
        if($this->_data && isset( $this->_data[ $key ] )){
            return $this->_data[ $key ]->value;
        }
        $result = $this->where('key', $key)->first();

        if(!$result) return "";
        
        $this->_data[ $key ] = $result;

        return $result->value;
    }
}

