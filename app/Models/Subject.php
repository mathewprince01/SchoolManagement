<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
    public function time_table(){
        return $this->hasMany(ClassTimetable::class);
    }
    public function marks(){
        return $this->hasMany(Mark::class, 'subject_id');
    }
}
