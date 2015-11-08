<?php

namespace App\Http\Controllers\Auth;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\AuthenticateUser;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\AuthenticateUserListener;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller implements AuthenticateUserListener
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/admin';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    protected function create($request)
    {
        return User::create([
            'first_name'   => $request->get('first_name'),
            'last_name'    => $request->get('last_name'),
            'username'  => $request->get('username'),
            'email'     => $request->get('email'),
//          'password'  => bcrypt($request->get('password')),
            'role'      => 1, // not admin
            'ip'        => $request->getClientIp()
//           'ip'        => inet_pton($request->getClientIp())
        ]);
    }

    public function getRegister(){

        return view('register');
    }

    public function postRegister( RegisterRequest $request )
    {

//      $ipCode = inet_pton($request->getClientIp());
        $ipCode = $request->getClientIp();

        $user_w_ip_exists = $this->ipExists($ipCode);

//      dd($user_w_ip_exists);

        if($user_w_ip_exists){


//          dd($user_w_ip_exists->delete());

            $user_w_ip_exists->delete();

            Image::where('ip', $ipCode)->delete();

            Session::flash('message', "No cheating bro!! You're disqualified now!! ");
            Session::flash('alert-class', 'error');

            return redirect()->route('home');

        }
        else {

        $user = $this->create($request);

        return redirect()->route('getUpload', $user->id);

        }

//
//        Session::flash('message', "You've been successfully registered.");
//        Session::flash('alert-class', 'alert-success');


    }

    //TODO: NAKIJKEN DEZE !!!!
//    public function handleUserWasAuthenticated(Request $request, $throttles)
//    {
//        if ($throttles) {
//            $this->clearLoginAttempts($request);
//        }
//
//        if (method_exists($this, 'authenticated')) {
//            return $this->authenticated($request, Auth::user());
//        }


//        return redirect()->route('getUpload', Auth::user()->id);
//        return redirect()->intended($this->redirectPath());
//    }



    public function ipExists($ip){

//        $ip = inet_pton('100.100.100.100'); // checking

        $user = User::withTrashed()->where('ip', $ip)->first();
//        dd($user);

        return $user;
    }


    /**
     * Register with some social provider, like facebook, google+.
     *
     * @param AuthenticateUser $authenticateUser
     * @param Request $request
     * @param null $provider
     * @return mixed
     */
    public function social_register( AuthenticateUser $authenticateUser, Request $request, $provider = null) {

        return $authenticateUser->execute($request->has('code'), $this, $provider);

    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userHasBeenRegistered($user) {

        return redirect()->route('getUpload', $user->id);
    }
}
