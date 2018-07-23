@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box">

    <div class="box__header box__header--valve">
        <h1>{{$valve->serial}}</h1>

        @if(count($valve->tests) > 0)
        <div class="valve-dates">
            <div class="valve-dates__first">First test: {{$valve->tests->first()->created_at->format('d-m-Y')}}</div>
            <div class="valve-dates__last">Last Test: {{$valve->tests->last()->created_at->format('d-m-Y')}}</div>
        </div>
        @endif
    </div>

    <div class="box__section valve-data">
        <div class="grid">
            <div class="cell cell-4-m">
                <div class="data">
                    <div class="data__label">Opening Pressure</div>
                    @if(count($valve->tests) > 0)
                    <div class="data__info"> {{$valve->tests->last()->opening_pressure}}</div>
                    @else
                    <div class="data__info">N/A</div>
                    @endif

                </div>
            </div>
            <div class="cell cell-4-m">
                <div class="data">
                    <div class="data__label">Vacuum Pressure</div>
                    @if(count($valve->tests) > 0)
                    <div class="data__info data__info--vac">{{$valve->tests->last()->opening_vacuum}}</div>
                    @else
                    <div class="data__info">N/A</div>
                    @endif
                </div>
            </div>

            <div class="cell cell-4-m">
                <div class="data">
                    <div class="data__label">Unit</div>
                    @if(count($valve->tests) > 0)
                    <div class="data__info">{{$valve->tests->last()->unit}}</div>
                    @else
                    <div class="data__info">N/A</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="valve-actions">
            <div class="btn-pair">
                <a  class="btn btn--secondary btn--lg" href="/certificate/{{$valve->serial}}">Test Certificate</a>
                <a  class="btn btn--secondary btn--lg" href="/declaration/">Declaration of Conformity</a>
            </div>

            @auth
                <a class="btn btn--primary btn--lg" href="/tests/create/{{$valve->serial}}">Re-Test</a>
            @endauth
        </div>
    </div>


    <div class="box__section valve-history">
        <h3>Test History</h3>
        <ul class="test-list">
            <li class="table-row table-row--header">
                <div class="table-cell table-cell--date">
                    Date
                </div>
                <div class="table-cell table-cell--open">
                    Opening
                </div>
                <div class="table-cell table-cell--close">
                    Vacuum
                </div>
                <div class="table-cell table-cell--unit">
                    Unit
                </div>
                <div class="table-cell table-cell--notes">
                    Notes
                </div>
            </li>

                    @if(count($valve->tests) > 0)
        @foreach($valve->tests->reverse() as $test)
        <li class="table-row">
            <div class="table-cell table-cell--date">
                {{$test->created_at->format('d-m-Y')}}
            </div>
            <div class="table-cell table-cell--open">
                {{$test->opening_pressure}}
            </div>
            <div class="table-cell table-cell--close">
                {{$test->opening_vacuum}}
            </div>
            <div class="table-cell table-cell--unit">
                {{$test->unit}}
            </div>
            <div class="table-cell table-cell--notes">
                {{$test->notes}}
            </div>

            @auth
            <div class="table-cell table-cell--delete">
                {{ Form::model($test, ['route' => ['tests.destroy', $test->id], 'method' => 'delete']) }}
                {{ Form::submit('Delete Test') }}
                {{ Form::close() }}
            </div>
            @endauth
        </li>
        @endforeach
        @endif
        </ul>
        @auth
    {{Form::model($valve, ['route' => ['valves.destroy', $valve->serial], 'method' => 'delete'])}}
    {{Form::submit('Delete Valve')}}
    {{Form::close()}}
    @endauth
    </div>

    </div>
    <!-- end Box -->
</div>
@endsection
