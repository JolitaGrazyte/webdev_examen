<?php

namespace App\Repositories;

use App\User;
use Session;
use App\Image;

class UserRepository {

    public function findByEmailOrCreate($userData, $ip){

        $name = explode(' ', $userData->name);

        $user_exist  = User::where('ip', $ip)->first();

        if($user_exist != null){

            Image::where('ip', $ip)->delete();
            $user_exist->delete();
            Session::flash('message', "No cheating bro!! You're disqualified now!! ");
            Session::flash('alert-class', 'error');
            return 'user exist';
        }

//        dd($user_exist);

        else{

            $user = User::create([

                'first_name'=>  $name[0],
                'last_name' =>  $name[1],
                'email'     =>  $userData->email,
                'role'      =>  1,
                'ip'        =>  $ip

            ]);

            Session::flash('message', 'Welcome, ' . $user->first_name.' '. $user->last_name);
            return $user;
        }
    }

}