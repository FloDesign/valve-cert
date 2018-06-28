@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['url' => 'search']) !!}
    {!! Form::text('search') !!}
    {!! Form::close() !!}
</div>
@endsection
