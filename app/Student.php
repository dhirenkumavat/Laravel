<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name','email','address','image'];
    // Accessor
    //  public function getnameAttribute($value)
    //  {
    //     return strtoupper($value);
    //  }
    //  public function getEmailAttribute($value)
    //  {
    //      return strtoupper($value);
    //  }
    //  public function getAddressAttribute($value)
    //  {
    //      return strtolower($value);
    //  }

     // Mutators 
     public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
