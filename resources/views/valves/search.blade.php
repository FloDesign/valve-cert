@extends('layouts.app')

@section('content')
<div class="container">
<div class="box">
    <h2>Find a Valve</h2>
    <p class="intro-text">Enter the valve serial number below. The valve serial number can be found on the valve box or inscribed onto the top of the valve &amp; will be a letter followed by 4 digits.</p>
    {!! Form::open(['url' => 'search']) !!}
    {!! Form::text('search', '', ['placeholder' => 'Valve number e.g. A1023', 'class' => 'standard-input']) !!}
    {{Form::submit('Find', ['class' => 'btn btn--primary btn--lg'])}}
    {!! Form::close() !!}
</div>
</div>
@endsection
