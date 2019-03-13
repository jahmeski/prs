<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerformanceIndicator;
use Illuminate\Support\Facades\Auth;
use App\Accomplishment;

class AccomplishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $performanceIndicator = PerformanceIndicator::findOrFail($request->id);
        return view('accomplishments.create', compact('performanceIndicator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $performanceIndicator = PerformanceIndicator::findOrFail($request->id);

        $accomplishment = $performanceIndicator->accomplishment()->create($request->all());
        $this->addTotal($accomplishment->id);
        return view('performanceIndicator.single', compact('performanceIndicator'));
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

    private function addTotal($id)
    {
        $accomplishment = Accomplishment::findOrFail($id);

        $total = 0;
        $total += $accomplishment->first_quarter;
        $total += $accomplishment->second_quarter;
        $total += $accomplishment->third_quarter;
        $total += $accomplishment->fourth_quarter;

        $accomplishment->total = $total;
        $accomplishment->update();
    }
}
