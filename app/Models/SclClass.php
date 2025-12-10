<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SclClass extends Model
{
     protected $table = 'scl_classes';
     public function student(){
        return $this->hasMany(Student::class);
    }
}
