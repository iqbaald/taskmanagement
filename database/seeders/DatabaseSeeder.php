<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            Akun::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
