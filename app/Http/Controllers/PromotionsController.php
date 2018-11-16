<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionReqeust;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::paginate(10);
        return View("promotion.index",compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $promotion = new Promotion();
      return View('promotion.create',compact('promotion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionReqeust $request)
    {
        $request->user()->promotion()->create($request->all());
        return redirect()->route('promotion.index')->with('success',"Your Promotion has created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return View('promotion.edit',compact('promotion'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionReqeust $request, Promotion $promotion)
    {
        $promotion->update($request->only('title','body'));
        return redirect('/promotion')->with('success',"Your promotion has been update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect ('/promotion')->with('success',"Your promotion has been delete");
    }
}
