<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Tracking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::paginate(6);
        return view('home',compact('promotions'));
    }

    public function search(Request $request){
        $tracking = Tracking::where('code',$request['code'])->first();
        if (!empty($tracking)){
            return redirect($tracking->url);
        }
        return redirect('/home')->with('fail',"None of this code exists.");
    }
}
