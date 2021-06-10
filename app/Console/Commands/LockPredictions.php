<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class LockPredictions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'euro:lock-predictions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lock predictions for users';

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
     * @return int
     */
    public function handle()
    {
        User::whereNotNull('id')
            ->update(['can_predict' => false]);

        return 0;
    }
}
