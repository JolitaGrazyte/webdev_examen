<?php

namespace App\Console\Commands;

use App\Period;
use App\Votes;
use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:winners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send a mail after the end of every period of the competition.';

    /**
     * Create a new command instance.
     *
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
        $user           =   User::where('role', 0)->first();
        $past_period    =   Period::past()->latest('end')->first();

//        dd(Carbon::now('Europe/Brussels')->format('Y-m-d H'));
//        dd($isTrue = $past_period->end->format('Y-m-d H'));
//        dd($isTrue = $past_period->end->format('Y-m-d H') == Carbon::now('Europe/Brussels')->format('Y-m-d H'));

        $isTrue = $past_period->end->format('Y-m-d H') == Carbon::now('Europe/Brussels')->format('Y-m-d H');

        if($isTrue){

            $winners['Period '.$past_period->id.' ('.$past_period->start.' - '.$past_period->end.')' ] = Votes::winners($past_period);

            $data = [
                'winners' => $winners,
                'user' => $user
            ];


            Mail::send('emails.notification',  $data, function ($m) use ($user) {


                $m->from('gogglesl@zealoptics.com', 'Zeal Optics')->to($user->email, $user->username)->subject('Ski Goggles Game Winners!');


            });
        }


    }

}