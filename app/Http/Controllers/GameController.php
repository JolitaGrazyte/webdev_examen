<?php

namespace App\Http\Controllers;

use App\Image;
use App\Period;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Votes;
use Illuminate\Support\Facades\DB;
use App\User;

class GameController extends Controller
{
    private $carbon;

    public function __construct(Carbon $carbon){

        $this->carbon = $carbon;

    }

    public function getAll(){

        $period = new Period();

        $current_period = $period->active()->first();
        $img  = new Image();

        $winners    = [];
        $pp_images  = $img->all();

        $rules = [
            'Hi everyone! Welcome to the Zeal Optics Ski Goggles Game!',
            'Competitions goes on for 4 periods.', 'The photo with the most votes wins!',
            'Every period a new winner is selected!',
            'The rules are simple: register, post the most amazing and unique photo from your last ski vacation.',
            'Sit back, relax and wait until the end of the period!',
            'After every period the winners will published on this page.'

        ];

        $past_periods = $period->past()->get();

        if($past_periods){

            foreach($past_periods as $key => $p){

//                $winners['Period '.($key+1)] = $this->getWinner($p);
                $winners['Period '.($key+1)] = Votes::winners($p);

            }
        }

        $images = $current_period != null ? $img->with('author')->active($current_period)->get() : null;



        return view('home', compact('images', 'winners', 'rules', 'pp_images'));
    }

//    private function getWinner($p){
//
//        $winners = Votes::whereHas('image', function($q) use($p){
//
//            $q->where('created_at', '>', $p['start'])->where('created_at', '<=', $p['end']);
//
//        })
//            ->with('image.author')->select('image_id', DB::raw('COUNT(image_id) as count'))
//            ->groupBy('image_id')
//            ->orderBy('count', 'desc')
//            ->take(3)->get();
//
//        return $winners;
//
//    }


    public function postVotes( Request $request ){

        $img_id = $request->get('image_id');
//        $request = Req::instance();
//        $request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
        $ip = $request->getClientIp();

        $exist = Votes::where('ip', $ip)->where('image_id', $img_id)->exists();

//        dd($exist);

        if(!$exist){
            $vote = Votes::create($request->all());
            $vote->ip = $ip;
            $vote->save();

            Session::flash('message', "Thank you for voting!");
            Session::flash('alert-class', 'success');
        }
        else {
            Session::flash('message', "No cheating !!! You can't vote for the same image 2 times");
            Session::flash('alert-class', 'warning');
        }

//        $vote = Votes::create($request->all());
//        $vote->ip = $ip;
//        $vote->save();

        return redirect()->route('home');

    }
//
//    public function makeWinnersMail($p){
//
//        $pp = Period::find(1);
//        $winners = $this->getWinner($pp);
//
//        return view('');
//
//    }


}
