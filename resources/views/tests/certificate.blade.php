
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="box">
    <div class="box__header">
            <h2>{{$valve->serial}} Test Certificate</h2>
            <div class="box__header__helpertxt">
                Pressure/Vacuume Breather Vent PV-80-E
            </div>
        </div>

        <div class="box__section valve-data">
            <div class="grid">
                <div class="cell cell-6-m">
                    <div class="data">
                        <div class="data__label">Nominal Pressure Rating</div>
                        <div class="data__info">10kPa</div>
                    </div>
                </div>
                <div class="cell cell-6-m">
                    <div class="data">
                        <div class="data__label">Nominal Vacuum Rating</div>
                        <div class="data__info">2.0kPa</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box__section valve-data">
            <div class="grid">
                <div class="cell cell-4-m">
                    <div class="data">
                        <div class="data__label">Actual Relief pressure</div>
                        <div class="data__info">{{$test->opening_pressure}}kPa</div>
                    </div>
                </div>
                <div class="cell cell-4-m">
                    <div class="data">
                        <div class="data__label">Actual Relief vacuum</div>
                        <div class="data__info">{{$test->opening_vacuum}}kPa</div>
                    </div>
                </div>
                <div class="cell cell-4-m">
                    <div class="data">
                        <div class="data__label">Date of Test</div>
                        <div class="data__info">{{$test->created_at->format('d-m-Y')}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box__section text-section">
            <p>We certify that the valve with the above serial number was tested and passed the following production acceptance tests.</p>

            <ul>
                <li>Relieving Pressure is as stated above</li>
                <li>Relieving Vacuum is as stated above</li>
                <li>Leak tightness test verified up to Relief Pressure</li>
                <li>Leak tightness test verified up to Relief Vacuum</li>
                <li>Overturn leak tightness test verified at 28 kPa (90, 180 and 270 degrees from the vertical).</li>
            </ul>

            <p>
            All test procedures were carried out in accordance with EN14595:2005 and EN12972:2018 Section 5.10
            </p>

            <p>This valve was built and tested under ISO 9002:2008.  Registration No, QAIC/UK/302.</p>
        </div>

        <div class="valve-actions">
            <div class="btn-pair">
                <input class="btn btn--primary btn--lg" type="button" onClick="window.print()" value="Print"/>
                <a href="{{ URL::previous() }}" class="btn btn--secondary btn--lg">Go Back</a>
            </div>
        </div>



    </div>
    <!-- end box -->
</div>


@endsection
