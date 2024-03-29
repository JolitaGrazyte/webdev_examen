<?php

namespace App\Http\Controllers;

use App\Image;
use App\Period;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Votes;
use Session;

class GameController extends Controller
{
    private $carbon;

    public function __construct(Carbon $carbon){

        $this->carbon = $carbon;

    }

    public function getAll(){

        $period = new Period();

        $current_period = $period->active()->first();
        $img            = new Image();

        $periods    = $period->all();
        $winners    = [];
        $pp_images  = !is_null($current_period) ? $img->pastperiod($current_period)->get() : null;

        $rules = [
            'Hi everyone! Welcome to the Zeal Optics Ski Goggles Game!',
            'The game goes on for 4 periods.', 'The photo with the most votes wins!',
            'Every period a new winner is selected!',
            'The rules are simple: register, post the most amazing and unique photo from your last ski vacation.',
            'Sit back, relax and wait until the end of the period!',
            'After every period the winners will be published on this page.',
            'You can only post once!',
            'You can als vote, but also only once for each photo!'

        ];

        $past_periods = $period->past()->get();

        if($past_periods){

            foreach($past_periods as $key => $p){

                $winners['Period '.($key+1)] = Votes::winners($p);
            }
        }

        $images = $current_period != null ? $img->with('author')->active($current_period)->get() : null;

        return view('home', compact('images', 'winners', 'rules', 'pp_images', 'periods'));
    }


    public function postVotes( Request $request ){

        $img_id = $request->get('image_id');
        $ip     = $request->getClientIp();
        $exist  = Votes::where('ip', $ip)->where('image_id', $img_id)->exists();

        if(!$exist){
            $vote = Votes::create($request->all());
            $vote->ip = $ip;
            $vote->save();

            Session::flash('message', "Thank you for voting!");
            Session::flash('alert-class', 'alert-success');
        }
        else {
            Session::flash('message', "No cheating !!! You can't vote for the same image more then ONE time!!!");
            Session::flash('alert-class', 'alert-warning');
        }

        return redirect()->route('home');

    }


}
