@extends('layouts.app')

@section('content')
<div class="container">
{{Form::model($valve, ['route' => ['valves.update', $valve->serial], 'method' => 'put'])}}
{{Form::label('Customer')}}
{{Form::text('customer')}}
{{Form::label('Territory')}}
{{Form::text('territory')}}
{{Form::submit('Update Valve')}}
{{Form::close()}}
</div>
@endsection
