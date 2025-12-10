<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sclclass(){
        return $this->belongsTo(SclClass::class, 'scl_class_id');
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }
    public function marks(){
        return $this->hasMany(Mark::class, 'student_id');
    }
}
