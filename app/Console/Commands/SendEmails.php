<?php

namespace App\Console\Commands;

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


        Mail::send('emails.notification', ['user' => $user], function ($m) use ($user) {


            $m->from('gogglesl@zealoptics.com', 'Zeal Optics')->to($user->email, $user->name)->subject('Ski Goggles Game Winners!');


        });
    }
}