<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Period;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;


class PeriodsController extends Controller
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
        $periods = Period::all();
        $admin_email = $this->getEmail();
        return view('admin.index', compact('admin_email', 'periods'))->withTitle('Admin');
    }

    public function getEmail(){

        $user   = User::where('role', 0)->first();
        $email  = $user->email;
        return $email;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.periods.create')->withTitle('Add periods');
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
           $this->addPeriod($request);

           Session::flash('message', "Period has been added successfully.");
           Session::flash('alert-class', 'alert-success');
       }
       catch(QueryException $e){

           Session::flash('message', "Something went wrong.");
           Session::flash('alert-class', 'alert-error');
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

        return view('admin.periods.edit', compact('period', 'start', 'end'))->withTitle('Edit period');
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
            $this->addPeriod($request, $id);

            Session::flash('message', "Period has been updated successfully.");
            Session::flash('alert-class', 'alert-success');
        }
        catch(QueryException $e){

            Session::flash('message', "Something went wrong.");
            Session::flash('alert-class', 'alert-error');
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


   private function addPeriod($request, $id = null){

        $period = $id == null ? $this->period : $this->period->find($id);
        $period->start  = date('Y-m-d h:i:s', strtotime($request->get('start')));
        $period->end    = date('Y-m-d h:i:s', strtotime($request->get('end')));
        $period->save();
    }
}
