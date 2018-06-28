
@extends('layouts.app')

@section('content')
<div class="container">
    Serial: {{$valve->serial}}
    Actual Relief pressure: {{$test->opening_pressure}}
    Actual Relief vacuum: {{$test->opening_vacuum}}
    Date of Test: {{$test->created_at->format('d-m-Y')}}
</div>
@endsection
