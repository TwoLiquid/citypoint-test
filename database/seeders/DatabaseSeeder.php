<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Class DatabaseSeeder
 *
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Seeding data sql dump
         */
        if (File::exists(base_path() . '/database/dumps/data.sql')) {
            DB::connection('mysql')->unprepared(
                File::get(base_path() . '/database/dumps/data.sql')
            );

            DB::connection('mysql_slave')->unprepared(
                File::get(base_path() . '/database/dumps/data.sql')
            );
        }
    }
}
