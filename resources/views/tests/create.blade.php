
@extends('layouts.app')

@section('content')
<div class="container">
    {{Form::open(['url' => `tests/create/${valve}`])}}
    {{Form::label('opening_pressure')}}
    {{Form::number('opening_pressure')}}
    {{Form::label('opening_vacuum')}}
    {{Form::number('opening_vacuum')}}
    {{Form::submit('Add Test')}}
    {{Form::close()}}
</div>
@endsection
