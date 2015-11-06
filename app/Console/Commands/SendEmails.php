<?php

namespace App\Console\Commands;

use App\Period;
use App\Votes;
use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

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

        $user = User::where('role', 0)->first();

        $past_periods = Period::past()->get();

        if($past_periods){

            foreach($past_periods as $key => $p){

                $winners['Period '.($key+1)] = Votes::winners($p);

            }
        }

//        dd($winners);

//        $winners = Votes::winners($p);

        $data = [
            'winners' => $winners,
            'user' => $user
        ];

//        Mail::send('mail-template', $data, function() { });


        Mail::send('emails.notification',  $data, function ($m) use ($user) {


            $m->from('gogglesl@zealoptics.com', 'Zeal Optics')->to($user->email, $user->username)->subject('Ski Goggles Game Winners!');


        });
    }
}