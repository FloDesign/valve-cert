@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['url' => 'valves'])!!}
    {{ Form::label('opening_pressure')}}
    {{ Form::number('opening_pressure', '', ['step' => '0.01'])}}
    {{ Form::label('opening_vacuum')}}
    {{ Form::number('opening_vacuum', '', ['step' => '0.01'])}}
    {{ Form::label('unit') }}
    {{ Form::select('unit', ['KPA' => 'KPA', 'PSI'=>'PSI'], 'KPA') }}
    {{Form::label('notes')}}
    {{Form::text('notes')}}
    {{ Form::submit('Add Valve') }}
    {!! Form::close() !!}
</div>
@endsection
