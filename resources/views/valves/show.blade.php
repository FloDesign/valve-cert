@extends('layouts.app')

@section('content')
<div class="container">
{{Form::model($valve, ['route' => ['valves.destroy', $valve->serial], 'method' => 'delete'])}}
{{Form::submit('Delete Valve')}}
{{Form::close()}}
    Serial: {{$valve->serial}}
    First test: {{$valve->tests->first()->created_at->format('d-m-Y')}}
    Last Test: {{$valve->tests->last()->created_at->format('d-m-Y')}}
    <div>
        Opening Pressure: {{$valve->tests->last()->opening_pressure}}
        Vacuum Pressure: {{$valve->tests->last()->opening_vacuum}}
        Unit: {{$valve->tests->last()->unit}}
        <a href="/certificate/{{$valve->serial}}">Test Certificate</a>
        <a href="/declaration\{{$valve->serial}}">Declaration of Conformity</a>
        @auth
            <a href="/tests/create/{{$valve->serial}}">Re-Test</a>
        @endauth
    </div>
    <div>
        Test History
    @foreach($valve->tests->reverse() as $test)
    Opening Pressure: {{$test->opening_pressure}}
    Opening Vacuum: {{$test->opening_vacuum}}
    Unit: {{$test->unit}}
    Notes: {{$test->notes}}
    @endforeach
</div>
</div>
@endsection
