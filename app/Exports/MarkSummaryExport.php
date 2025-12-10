<?php

namespace App\Exports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MarkSummary implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $mark;
    public function __construct($mark)
    {
        return $this->mark;
    }

    public function collection()
    {
        return Mark::all();
    }

    public function map($mark): array
    {
        return [

            $mark->student->student_id,
            $mark->student->full_name,
            $mark->student->sclclass->name,
            $mark->student->section->name,
            $mark->subject->name,
            $mark->marks_obtained,
            $mark->grade

        ];
    }

    public function headings(): array
    {
        return [
            'Student ID',
            'Student Name',
            'Class',
            'Section',
            'Subject',
            'Marks',
            'Grade'
        ];
    }
}
