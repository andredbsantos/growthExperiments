@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (isset($errors) && count($errors->all()))
                    <div class="alert alert-danger">
                        <p><strong>Please fix the following errors:</strong></p>
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    {!! Form::open(['url' => 'experiments/add']) !!}
                        <h3>General Info</h3>
                        @if ($errors->has('name'))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'value'=>'{{ old("name") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Tags') !!}
                            {!! Form::text('tags', null, array('class'=>'form-control', 'placeholder'=>'Tags', 'value'=>'{{ old("tags") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Current Phase') !!}
                            {!! Form::select('phase', $selects['phases'], null, array('class' => 'form-control', 'value'=>'{{ old("phase") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Due Date') !!}
                            {!! Form::date('due_date', \Carbon\Carbon::now(), array('class' => 'form-control', 'value'=>'{{ old("due_date") }}')) !!}
                        </div>
                        <hr>
                        <h3>Brainstorm</h3>
                        @if ($errors->has('bs_metric'))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            {!! Form::label('What is the success metric?') !!}
                            <small>What is the experiment's success metric? Ex: Number of visits, sign-up conversion rate, churn rate…</small>
                            {!! Form::text('bs_metric', null, array('class'=>'form-control', 'placeholder'=>'Metric', 'value'=>'{{ old("bs_metric") }}')) !!}
                        </div>
                        @if ($errors->has('bs_goal'))
                        <div class="form-group has-error">
                        @else
                        <div class="form-group">
                        @endif
                            {!! Form::label('What is your goal?') !!}
                            <small>What is your experiment's goal? Ex: From 10% to 15%, from $12 to $14...</small>
                            {!! Form::text('bs_goal', null, array('class'=>'form-control', 'placeholder'=>'Goal', 'value'=>'{{ old("bs_goal") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('What is the impact on your user base?') !!}
                            <small>The % of your user base that'll be affected by the improvement.</small>
                            {!! Form::select('bs_impact', $selects['percentages'], null, array('class' => 'form-control', 'value'=>'{{ old("bs_impact") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label("What's the confidence rate?") !!}
                            <small>Based on previous experiments and acquired knowledge, roughly estimate the probability of your test being successful.</small>
                            {!! Form::select('bs_confidence', $selects['percentages'], null, array('class' => 'form-control', 'value'=>'{{ old("bs_confidence") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('How much effort will it take?') !!}
                            <small>How much effort will it take to ship this test and run it.</small>
                            {!! Form::select('bs_effort', $selects['efforts'], null, array('class' => 'form-control', 'value'=>'{{ old("bs_effort") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('How will you measure the results?') !!}
                            <small>Describe how you plan to run the test and measure the results.</small>
                            {!! Form::textarea('bs_results', null, array('class' => 'form-control', 'size' => '30x4', 'value'=>'{{ old("bs_results") }}')) !!}
                        </div>
                        <hr>
                        <h3>Prioritize</h3>
                        <div class="form-group">
                            {!! Form::label('Priority') !!}
                            {!! Form::select('pr_priority', $selects['priorities'], null, array('class' => 'form-control', 'value'=>'{{ old("pr_priority") }}')) !!}
                        </div>
                        <hr>
                        <h3>Build</h3>
                        <div class="form-group">
                            {!! Form::label('Instructions') !!}
                            {!! Form::textarea('bl_instructions', null, array('class' => 'form-control', 'size' => '30x4', 'value'=>'{{ old("bl_instructions") }}')) !!}
                        </div>
                        <hr>
                        <h3>Test</h3>
                        <div class="form-group">
                            {!! Form::label('Experiment Start Date') !!}
                            {!! Form::date('ts_startdate', \Carbon\Carbon::now(), array('class' => 'form-control', 'value'=>'{{ old("ts_startdate") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Experiment End Date') !!}
                            {!! Form::date('ts_enddate', \Carbon\Carbon::now(), array('class' => 'form-control', 'value'=>'{{ old("ts_enddate") }}')) !!}
                        </div>
                        <hr>
                        <h3>Analyze</h3>
                        <div class="form-group">
                            {!! Form::label('How much % of improve or decrease?') !!}
                            <small>Be quantitative! Compare the results of your baseline KPI (the point you started from on Brainstorm > What was your goal).</small>
                            {!! Form::text('al_results_quantitative', null, array('class'=>'form-control', 'placeholder'=>'Quantitative', 'value'=>'{{ old("al_results_quantitative") }}')) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('Did the test achieve its goals?') !!}
                        <small>Check on "Brainstorm"> "What is the goal?".</small>
                        Yes {!! Form::radio('al_goal_achieved', true, false, array('value'=>'{{ old("al_goal_achieved"')) !!}
                        No {!! Form::radio('al_goal_achieved', false, false, array('value'=>'{{ old("al_goal_achieved"')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('What were the results of the experiment?') !!}
                            <small>How close to your initial hypothesis? Why did you get the result that you did?</small>
                            {!! Form::text('al_results', null, array('class'=>'form-control', 'placeholder'=>'Quantitative', 'value'=>'{{ old("al_results") }}')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('What did you learn from this experiment?') !!}
                            <small>Share here your hits, misses and important things you've learned...</small>
                            {!! Form::textarea('al_learnings', null, array('class' => 'form-control', 'size' => '30x4', 'value'=>'{{ old("al_learnings") }}')) !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            {!! Form::submit('Save', array('class'=>'btn btn-info')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
