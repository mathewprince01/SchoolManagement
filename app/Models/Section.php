<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     public function student(){
        return $this->hasMany(Section::class);
    }
}
