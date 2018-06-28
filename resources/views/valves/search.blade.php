@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Find a Valve</h2>
    <p>Enter the valve serial number below. The valve number can be found on the valve box or inscribed onto the top of the valve</p>
    {!! Form::open(['url' => 'search']) !!}
    {!! Form::text('search', '', ['placeholder' => 'Valve number e.g. A1023']) !!}
    {{Form::submit('Find')}}
    {!! Form::close() !!}
</div>
@endsection
