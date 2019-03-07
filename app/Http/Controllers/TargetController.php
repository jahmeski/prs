<?php

namespace App\Http\Controllers;

use App\Target;
use Illuminate\Http\Request;
use App\PerformanceIndicator;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $performanceIndicator = PerformanceIndicator::findOrFail($request->id);
        return view('targets.create', compact('performanceIndicator'));
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

        $target = $performanceIndicator->target()->create($request->all());
        $this->addTotal($target->id);
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
        $target = Target::findOrFail($id);

        return view('targets.edit', compact('target'));
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
        $target = Target::findOrFail($id);
        $target->update($request->all());
        $this->addTotal($target->id);
        return view('targets.edit', compact('target'));
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
        $target = Target::findOrFail($id);

        $total = 0;
        $total += $target->first_quarter;
        $total += $target->second_quarter;
        $total += $target->third_quarter;
        $total += $target->fourth_quarter;

        $target->total = $total;
        $target->update();
    }
}
