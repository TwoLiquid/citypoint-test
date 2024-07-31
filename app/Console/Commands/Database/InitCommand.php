<?php

namespace app\Console\Commands\Database;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class InitCommand
 *
 * @package app\Console\Commands\Database
 */
class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application databases init command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Migrating master database...');
        Artisan::call("migrate:refresh --database='mysql'");

        $this->info('Migrating slave database...');
        Artisan::call("migrate:refresh --database='mysql_slave'");

        $this->info('Seeding master and slave databases with data.sql dump...');
        Artisan::call("db:seed");
    }
}
