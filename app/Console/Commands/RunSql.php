<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class RunSql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:sql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run provided SQL file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::unprepared(file_get_contents(base_path('seed-db.sql')));
        $this->info('SQL file has run!');
    }
}
