<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use PermissionTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
    }
}
