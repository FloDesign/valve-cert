@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/valves/create">New Valve</a>
    @foreach($valves as $valve)
        <a href="valves/{{$valve->serial}}">{{$valve->serial}}</a>
    @endforeach
</div>
@endsection
