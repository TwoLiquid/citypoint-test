<?php

namespace app\Console\Commands\Database;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateCommand
 *
 * @package app\Console\Commands\Database
 */
class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connections = [
            'mysql'       => 'master',
            'mysql_slave' => 'slave'
        ];

        foreach ($connections as $connection => $database) {
            $this->info('Creating ' . $database . ' database...');

            $schemaName = $database;
            $charset = config("database.connections." . $connection . ".charset",'utf8mb4');
            $collation = config("database.connections." . $connection . ".collation",'utf8mb4_unicode_ci');

            config(["database.connections." . $connection . ".database" => null]);

            $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

            DB::statement($query);

            config(["database.connections." . $connection . ".database" => $schemaName]);
        }
    }
}
