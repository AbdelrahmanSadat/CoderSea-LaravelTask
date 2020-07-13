<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function employees(){
        return $this->hasMany('App\User');
    }
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'logo' => 'logo.png',
    ];
}
