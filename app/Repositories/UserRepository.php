<?php

namespace App\Repositories;

use App\User;
use Session;

class UserRepository {

    public function findByEmailOrCreate($userData, $ip){

        $name = explode(' ', $userData->name);

        $user_exist  = User::where('email', $userData->email)->first();

        if($user_exist != null){

            Session::flash('message', 'You are already in the system! Can not register more then one time');
//            Session::flash('alert-class', 'alert-fail');
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