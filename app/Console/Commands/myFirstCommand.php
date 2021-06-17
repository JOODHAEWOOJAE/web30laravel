<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class myFirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:myFirstCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'myFirstCommand description';

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
        $this->line('--');
        $this->line('DEFAULT COLOR MESSAGE');
        $this->info('GREEN COLOR MESSAGE');
        $this->comment('ORANGE COLOR MESSAGE');
        $this->question('AQUA COLOR MESSAGE');
        $this->warn('ORANGE WARN COLOR MESSAGE');
        $this->error('RED COLOR MESSAGE');
        $this->line('--');
    }
}
