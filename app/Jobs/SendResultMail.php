<?php

namespace App\Jobs;

use App\Mail\ResultMail;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendResultMail implements ShouldQueue
{
    use Queueable;

    public $student;
    public $mark;
    public function __construct(Mark $mark, Student $student)
    {
        $this->mark = $mark;
        $this->student  = $student;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->student->email)->send(new ResultMail($this->mark, $this->student));
    }
}
