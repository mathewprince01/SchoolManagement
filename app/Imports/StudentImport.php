<?php

namespace App\Imports;

use App\Models\SclClass;
use App\Models\Section;
use App\Models\student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $class = SclClass::where('name', $row[3])->firstorFail();
        $section = Section::where('name', $row[4])->firstorFail();
        return new student([
            'full_name' =>$row[0],
            'student_id' => $row[1],
            'roll_number' =>$row[2],
            'scl_class_id' =>$class->id,
            'section_id' =>$section->id,
            'gender' =>$row[5],
            'date_of_birth' =>$row[6],
            'contact_number' =>$row[7],
            'address' =>$row[8],
            'parent_name' =>$row[9],
            'parent_contact' =>$row[10],
            'user_id' =>$row[11],
            'email' => $row[12]
        ]);
    }
}
