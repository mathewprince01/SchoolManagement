<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SclClasse extends Model
{
    public function student(){
        return $this->hasMany(Student::class);
    }
}
