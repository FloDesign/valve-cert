@extends('layouts.app')

@section('content')
<div class="container">
{{Form::model($valve, ['route' => ['valves.destroy', $valve->serial], 'method' => 'delete'])}}
{{Form::submit('Delete Valve')}}
{{Form::close()}}
    Serial: {{$valve->serial}}
    Customer: {{$valve->customer}}
    Territory: {{$valve->territory}}
    @foreach($valve->tests as $test)
    Opening Pressure: {{$test->opening_pressure}}
    Opening Vacuum: {{$test->opening_vacuum}}
    Unit: {{$test->unit}}
    Notes: {{$test->notes}}
    @endforeach
</div>
@endsection
