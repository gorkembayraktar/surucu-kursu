<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';

    protected $fillable = ['full_name', 'degree', 'image', 'socials'];

    /**
     * Get the user's social links
     *
     * @param  string  $value
     * @return string
     */

    public function getSocialsAttribute($value)
    {
        return new SocialElement($value);
    }
}

class SocialElement{
    private $_social;

    public function __construct($value){
        try{
            $this->_social = json_decode($value);
        }catch(Exception $e){
           $this->_social = new \stdClass;
        }
    }
    public function get( $name ){
        if($this->_social && property_exists( $this->_social, $name)){
            return $this->_social->$name;
        }
        return null;
    }
}
