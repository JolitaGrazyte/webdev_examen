<?php

namespace App\Console;

use App\Period;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\SendEmails::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->command('emails:send')->when( function ( Period $period ) {

            $pp = $period->past()->get();

            foreach($pp as $p){

//                    return $period->find($p['id'])->end == Carbon::now();

                return $period->find($p['id'])->end == Carbon::now()->toDateString();
                }

        });
    }
}
