<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerformanceIndicator;
use Illuminate\Support\Facades\Auth;
use App\Year;
use App\Agency;

class PerformanceIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $performanceIndicators = PerformanceIndicator::where('agency_id', Auth::user()->agency_id)->orderBy('created_at', 'DESC')->get();
        if ($performanceIndicators) {
            return view('accomplishment.index', compact('performanceIndicators'));
        }
        $performanceIndicators = new PerformanceIndicator();
        return view('accomplishment.index', compact('performanceIndicators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::pluck('year', 'id')->all();
        return view('accomplishment.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $performanceIndicator = new PerformanceIndicator();

        $performanceIndicator->name = $request['name'];
        $performanceIndicator->agency_id = Auth::user()->agency_id;
        $performanceIndicator->year_id = $request['year_id'];

        $performanceIndicator->save();
   
        return view('accomplishment.single', compact('performanceIndicator'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
