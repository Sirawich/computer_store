<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackingRequest;
use App\StatusProduct;
use App\Tracking;
use App\User;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trackings = Tracking::paginate(5);
        return View('tracking.index',compact('trackings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracking = new Tracking();
        $status = StatusProduct::all();
        $users = User::all();
        return View('tracking.create',compact('tracking','status','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['code'] = $this->getCode();
        Tracking::create($request->all());
        return redirect('/tracking')->with('success',"Your tracking has been created");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracking $tracking)
    {
        $users = User::all();
        $status = StatusProduct::all();
        return View('tracking.edit',compact('tracking','status','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(TrackingRequest $request, Tracking $tracking)
    {
        if ($request->status_id == 1){
            $tracking['complete_at'] = null;
            $tracking['receive_at'] = null;
        }
        elseif ($request->status_id == 2){
            $tracking['complete_at'] = null;
            $tracking['receive_at'] = null;
        }
        elseif ($request->status_id == 3){
            if (!empty($tracking->receive_at)){
                $tracking['receive_at'] = null;
            }
            $tracking['complete_at'] = date(now());
        }elseif ($request->status_id == 4){
            if (empty($tracking->complete_at)){
                $tracking['complete_at'] = date(now());
            }
            $tracking['receive_at'] = date(now());
        }
        $tracking->update($request->all());
        return redirect('/tracking')->with('success',"Your tracking has been update");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
      $tracking->delete();
      return redirect('/tracking')->with('success',"Your tracking has been deleted");
    }

    private function getCode(){
        do{
            $rand = rand(1000,9999);
        }while(!empty(Tracking::where('code',$rand)->first()));
        return $rand;
    }
}
