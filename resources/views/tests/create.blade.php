@extends('layouts.app')

@section('content')
<div class="container">
<div class="box">
    <div class="box__header">
        <div class="box__header__helpertxt">
            Re-Test. Enter new test results for:
        </div> 
        <h1>{{$valve->serial}}</h1>
    </div>
    <!-- end box__header -->
    {!! Form::open(['url' => "tests/create/{$valve->serial}"])!!}
    {{ Form::hidden('serial', $valve->serial) }}

     <div class="standard-input-container">
        {{ Form::label('opening_pressure')}}
        {{ Form::number('opening_pressure', '', ['step' => '0.01', 'placeholder' => 'Enter opening pressure', 'class' => 'standard-input'])}}
    </div>

    <div class="standard-input-container">
        {{ Form::label('opening_vacuum')}}
        {{ Form::number('opening_vacuum', '', ['step' => '0.01', 'placeholder' => 'Enter opening vacuum', 'class' => 'standard-input'])}}
    </div>

    <div class="standard-input-container standard-input-container--radio">
        {{ Form::label('unit') }}
        <div class="radio-set">
            <div class="standard-radio">
                {{ Form::radio('unit', 'KPA', true) }}
                KPA
            </div>

            <div class="standard-radio">
                {{ Form::radio('unit', 'PSI')}}
                PSI
            </div>
        </div>
    </div>

    <div class="standard-input-container">
        {{Form::label('notes')}}
        {{Form::text('notes', '', ['class' => 'standard-input'])}}
    </div>

    <div class="btn-pair">
        {{ Form::submit('Add New Test', ['class' => 'btn btn--primary btn--lg']) }}
        <a href="/valves" class="btn btn--secondary btn--lg">Cancel</a>
    </div>
    {!! Form::close() !!}
    </div>
    <!-- end box -->
</div>
@endsection
