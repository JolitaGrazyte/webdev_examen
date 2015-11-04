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

        $current_period = Period::active()->first();

//        dd($current_period);

        $periods = Period::all();

        $rules = [
            'Hi everyone! Welcome to the Zeal Optics Ski Goggles Game!',
            'Competitions goes on for 4 periods.', 'The photo with the most votes wins!',
            'Every period a new winner is selected!',
            'The rules are simple: register, post the most amazing and unique photo from your last ski vacation.',
            'Sit back, relax and wait until the end of the period!'

        ];

        $past_periods = Period::past()->get();


        foreach($past_periods as $key => $p){


                $winners['Period '.($key+1)] = $this->getWinner($p);

        }

//        dd($winners);
        $images = $current_period != null ? Image::active($current_period)->get() : null;

        return view('home', compact('images', 'winners', 'rules'));
    }

    public function getWinner($p){

        $winners = Votes::whereHas('image', function($q) use($p){

            $q->where('created_at', '>', $p['start'])->where('created_at', '<=', $p['end']);

        })
            ->with('image.author')->select('image_id', DB::raw('COUNT(image_id) as count'))
            ->groupBy('image_id')
            ->orderBy('count', 'desc')
            ->take(3)->get();

        return $winners;

    }


    public function postVotes( Request $request ){

        $img_id = $request->get('image_id');
//        $request = Req::instance();
//        $request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
        $ip = $request->getClientIp();

        $exist = Votes::where('ip', $ip)->where('image_id', $img_id)->exists();

//        $max = Votes::whereRaw('id = (select max(`id`) from votes)')->get();

//        dd($exist);

//        if(!$exist){
//            $vote = Votes::create($request->all());
//            $vote->ip = $ip;
//            $vote->save();
//        }
//        else {
//            Session::flash('message', 'No cheating !!! You can't vote for the same image 2 times');
//        }

        $vote = Votes::create($request->all());
        $vote->ip = $ip;
        $vote->save();

        return redirect()->route('home');

    }


}
