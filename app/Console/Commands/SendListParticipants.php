<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Excel;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendListParticipants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:participants';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'This command will send a mail every night with a list of participant.';

    /**
     * Create a new command instance.
     *
     */
    private $date;
    public function __construct()
    {
        parent::__construct();

        $this->date =  Carbon::now()->toDateString();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::where('role', 0)->first();

        $this->makeExcelFile();

        $data = [
            'user' => $user
        ];

        $date = $this->date;

        Mail::send('emails.participants',  $data, function ($m) use ($user, $date) {


            $m->from('gogglesl@zealoptics.com', 'Zeal Optics')->to($user->email, $user->username)->subject('Game Participants');

            $m->attach(storage_path('app').'/excel/exports/ParticipantsList_'.$date.'.xls');


        });

    }

    private function makeExcelFile()
    {
        $user_list = [];

        $date = $this->date;

        $participants = User::where('role', '!=', 0)->where('created_at', 'LIKE', $date.'%' )->get(); // participants of today
//        $participants = User::where('role', '!=', 0)->get(); // all participants
//        dd($participants);

        if(count($participants)){

            foreach($participants as $participant){

                $user_list[] = [
                    'username'=>$participant->username,
                    'email'=>$participant->email
                ];
            }
        }
        else {
            $user_list[] = [
                'username'=>'',
                'email'=>''
            ];

        }


        Excel::create('ParticipantsList_'.$date, function($excel)  use ($user_list){

            $excel->sheet('participants', function($sheet) use ($user_list){

                $sheet->fromArray($user_list);

            });

        })->store('xls', storage_path('app/excel/exports'));

    }
}
