<?php

namespace App\Console\Commands;

use App\Jobs\SaveImageJob;
use Illuminate\Console\Command;

class SaveImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

    }
}
