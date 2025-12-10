<?php

namespace App\Exports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TopPerformer implements FromCollection, WithMapping, WithHeadings
{

    public $mark;
    public function __construct($mark)
    {
        return $this->mark = $mark;
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
            $mark->marks_obtained,
            $mark->grade
        ];
    }

    public function headings(): array
    {
        return [
            'Student ID',
            'Student Name',
            'Marks',
            'Grade'
        ];
    }
}
