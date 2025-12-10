<?php

use App\Models\SclClass;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('student_id')->unique();
            $table->string('full_name',100);
            $table->bigInteger('roll_number')->unique();
            $table->foreignIdFor(SclClass::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Section::class)->constrained()->cascadeOnDelete();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('contact_number',10);
            $table->string('email')->unique();
            $table->string('address');
            $table->string('parent_name');
            $table->string('parent_contact',10);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
