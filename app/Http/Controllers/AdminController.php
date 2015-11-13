<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Period;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ChangeEmailRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Auth;


class AdminController extends Controller
{
    private $period;

    public function __construct( Period $period ){

        $this->period = $period;
        $this->middleware('admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods        = Period::all();
        $admin_email    = $this->getEmail();
        return view('admin.index', compact('admin_email', 'periods'))->withTitle('Admin');
    }

    public function getEmail(){

        $user   = User::where('role', 0)->first();
        $email  = !is_null($user) ? $user->email : '';
        return $email;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $now = Carbon::now()->format('Y-m-d H:i:s');
        return view('admin.periods.create')->withTitle('Add periods')->withNow($now);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PeriodRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodRequest $request)
    {

       try{
           $this->addOrUpdatePeriod($request);

           Session::flash('message',        "Period has been added successfully.");
           Session::flash('alert-class',    'alert-success');
       }
       catch(QueryException $e){

           Session::flash('message',        "Something went wrong.");
           Session::flash('alert-class',    'alert-error');
       }

        return redirect()->route('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $period = $this->period->find($id);
        $now = Carbon::now()->format('Y-m-d H:i:s');
        return view('admin.periods.edit', compact('period', 'start', 'end', 'now'))->withTitle('Edit period');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PeriodRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodRequest $request, $id)
    {

        try{
            $this->addOrUpdatePeriod($request, $id);

            Session::flash('message',       "Period has been updated successfully.");
            Session::flash('alert-class',   'alert-success');
        }
        catch(QueryException $e){

            Session::flash('message',       "Something went wrong.");
            Session::flash('alert-class',   'alert-error');
        }

        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period = $this->period->find($id);
        $period->delete();

        return redirect()->route('admin');
    }


    /** Method to add a new period or update an existing period.
     * @param $request
     * @param null $id
     */
    private function addOrUpdatePeriod($request, $id = null){

        $period         = $id == null ? $this->period : $this->period->find($id);
        $period->start  = $request->get('start');
        $period->end    = $request->get('end');
        $period->save();
    }

    public function changeEmail( ChangeEmailRequest $request ){


        try{

            $auth   =   Auth::user();
            $user   =   User::where('id', $auth->id)->where('role', 0)->first();

            if($user->email != $request->get('email'))
            {
                $user->email = $request->get('email');
                $user->save();

                Session::flash('message',       "Your email has been successfully updated.");
                Session::flash('alert-class',   'alert-success');
            }
            else{

                Session::flash('message',       "Nothing to update.");
                Session::flash('alert-class',   'alert-warning');

            }


        }
        catch(QueryException $e){

            dd($e->getMessage());

            Session::flash('message',       "Something went wrong.");
            Session::flash('alert-class',   'alert-error');
        }


        return redirect()->back();
    }


}
