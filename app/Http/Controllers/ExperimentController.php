<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Experiment;

use App\Http\Requests\ExperienceFormRequest;
use Illuminate\Support\Facades\Auth;

class ExperimentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiments = Experiment::orderBy('phase', 'asc')->paginate(10);

        return view('experiments/list')->with('experiments', $experiments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiments/create')->with('selects', array(   'phases' => Experiment::getPhases(),
                                                                    'percentages' => Experiment::getPercentages(),
                                                                    'efforts' => Experiment::getEfforts(),
                                                                    'priorities' => Experiment::getPriorities()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ExperienceFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceFormRequest $request)
    {
        $inputs = $request->all();
        $inputs['creator_id'] = Auth::id();

        Experiment::create($inputs);

        return \Redirect::route('experiments')->with('message', 'Experiment added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiment = Experiment::find($id);

        return view('experiments/edit')->with('data', array(    'experiment' => $experiment,
                                                                'selects' => array('phases' => Experiment::getPhases(),
                                                                                   'percentages' => Experiment::getPercentages(),
                                                                                    'efforts' => Experiment::getEfforts(),
                                                                                    'priorities' => Experiment::getPriorities())));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ExperienceFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceFormRequest $request, $id)
    {
        $experiment = Experiment::find($id);
        $experiment->update($request->all());

        return \Redirect::route('experiments')->with('message', 'Experiment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Experiment::destroy($id);

        return \Redirect::route('experiments')->with('message', 'Experiment deleted successfully!');
    }
}
