<?php

namespace App\Http\Controllers;

use App\Period;
use App\User;
use App\Http\Requests;
use Mail;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $periods = Period::all();
        $admin_email = $this->getEmail();
        return view('admin.index', compact('admin_email', 'periods'))->withTitle('Admin');
    }

    public function getEmail(){

        $user   = User::where('role', 0)->first();
        $email  = $user->email;
        return $email;
    }

//    public function sendEmail()
//    {
//        $user = User::where('role', 0)->first();
//        $periods = Period::all();
//
//        foreach($periods as $period){

//
//            dd($period->end);
//        }
//
////        Mail::send('emails.notification', ['user' => $user], function ($m) use ($user) {
////
////
////            $m->from('gogglesl@zealoptics.com', 'Zeal Ski Goggles Game Winners')->to($user->email, $user->name)->subject('Notification mail!');
////
////
////        });
//
//        return redirect()->back();
//
//    }
}
