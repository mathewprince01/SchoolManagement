<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SclClass extends Model
{
     protected $table = 'scl_classes';
      protected $fillable = ['name'];
     public function student(){
        return $this->hasMany(Student::class);
    }
}
