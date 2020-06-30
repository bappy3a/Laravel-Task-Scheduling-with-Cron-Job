<?php

namespace App\Console\Commands;

use App\Salary;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CronTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $limit = Carbon::now()->subDay(7);
        $inactive_user = User::where('last_login', '<', $limit)->get();

        foreach ($inactive_user as $user) {
            $salary = New Salary;
            $salary->user_id = $user->id;
            $salary->user_name = $user->name;
            $salary->save();
        }
    }
}
