<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Timur',
            'email' => 'dj.famer@gmail.com',
            'password' => Hash::make('aaa'),
            'type' => 'admin',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Muradin',
            'email' => 'muradin@gmail.com',
            'password' => Hash::make('aaa'),
            'type' => 'employer',
        ]);

        \App\Models\Company::factory()->create([
            'name' => 'Timur OOO',
            'user_id' => 1,
        ]);

        \App\Models\Company::factory()->create([
            'name' => 'Zarina OOO',
            'user_id' => 1,
        ]);

        \App\Models\Company::factory()->create([
            'name' => 'Muradin OOO',
            'user_id' => 1,
            'moderated' => 'yes',
        ]);

        \App\Models\Position::factory(10)->create(['company_id' => 1, 'moderated' => 'yes']);
        \App\Models\Position::factory(10)->create(['company_id' => 1, 'moderated' => 'no']);

    }
}
