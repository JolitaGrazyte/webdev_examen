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
        \App\Console\Commands\SendWinners::class,
        \App\Console\Commands\SendListParticipants::class,
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


        $schedule->command('emails:winners')->when( function ( Period $period ) {

            $pp =  $period->past()->get();

            foreach($pp as $p){

                return substr($p->end, 0, 13) == Carbon::now('Europe/Brussels')->format('Y-m-d H');

            }


        });

        $schedule->command('emails:participants');
    }
}
