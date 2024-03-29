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
    protected $username = 'username';

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
//          'ip'        => inet_pton($request->getClientIp())
        ]);
    }


//

    public function postRegister( RegisterRequest $request )
    {

//      $ipCode = inet_pton($request->getClientIp());
        $ipCode = $request->getClientIp();

        $user_w_ip_exists = $this->ipExists($ipCode);

        if($user_w_ip_exists){

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

    }



    /** Method to check if a user with this ip record already exist in our database.
     * @param $ip
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    private function ipExists($ip){

//        $ip = inet_pton('100.100.100.100'); // checking
        $user = User::withTrashed()->where('ip', $ip)->first();

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
