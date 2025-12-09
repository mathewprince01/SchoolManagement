<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
            'name' => 'mathew',
            'email' => 'mathew@gmail.com',
            'password' => Hash::make('321456'),
            'role' => 'Admin'
        ]);
        User::factory()->create([
            'name' => 'james',
            'email' => 'james@gmail.com',
            'password' => Hash::make('321456'),
            'role' => 'Teacher'
        ]);
        User::factory()->create([
            'name' => 'suvisesh',
            'email' => 'suvisesh@gmail.com',
            'password' => Hash::make('321456'),
            'role' => 'Student'
        ]);
        User::factory()->create([
            'name' => 'luman',
            'email' => 'luman@gmail.com',
            'password' => Hash::make('321456'),
            'role' => 'Student'
        ]);

        $this->call(DatainputSeeder::class);
    
    }
}
