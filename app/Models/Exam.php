<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function mark(){
        return $this->hasOne(Mark::class, 'exam_id');
    }
}
