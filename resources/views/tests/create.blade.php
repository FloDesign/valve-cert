@extends('layouts.app')

@section('content')
<div class="container">
    Re-Test. Enter new test results for:
    <h1>{{$valve->serial}}</h1>
    {!! Form::open(['url' => "tests/create/{$valve->serial}"])!!}
    {{ Form::hidden('serial', $valve->serial) }}
    {{ Form::label('opening_pressure')}}
    {{ Form::number('opening_pressure', '', ['step' => '0.01', 'placeholder' => 'Enter opening pressure'])}}
    {{ Form::label('opening_vacuum')}}
    {{ Form::number('opening_vacuum', '', ['step' => '0.01', 'placeholder' => 'Enter opening vacuum'])}}
    {{ Form::label('unit') }}
    {{ Form::radio('unit', 'KPA', true) }}
    KPA
    {{ Form::radio('unit', 'PSI')}}
    PSI
    {{Form::label('notes')}}
    {{Form::text('notes')}}
    {{ Form::submit('Add Test') }}
    <a href="/valves">Cancel</a>
    {!! Form::close() !!}
</div>
@endsection
