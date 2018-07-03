@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box">
        <div class="box__header">
            <h2>Fairfax 3D Design Ltd.</h2>
            <div class="box__header__helpertxt">
                Declaration Of Conformity
            </div> 
        </div>

        <div class="box__section">

            <dl class="valve-info">
                <dt>Product Description:</dt>
                <dd>Pressure Vacuum Breather Vent</dd>
                <dt>Product Part Number:</dt>
                <dd>PV-80-E</dd>
                <dt>Pressure Setting:</dt>
                <dd>Not less than 8 kPa and not greater than 12 kPa</dd>
                <dt>Vacume Setting</dt>
                <dd>Not less than 0.4kPa And not greater then 2.5kPa</dd>
            </dl>
        </div>

        <div class="box__section text-section">

            <p>The PV-80-E breather vent valve has been manufactured to meet the requirements of EN14595:2005 ‘Pressure and Vacuum Breather Vents’ within the settings stated above. It also meets the requirements of EN12972:2007 ‘Tanks for the transport of dangerous goods – testing, inspection and marking of metallic tanks’ Section 5.10.</p> 

            <p>The valve has been fitted with an End Of Line Deflagration Flame Arrestor which meets the requirements of EN 16522:2014.  End of line Deflagration test 7.3.2 gas group IIAb. Type identifier DEF, Po 35 kPa, To 70C, Lu/D (n/a), Explosion Group IIAb</p> 

            <p>Within EN14595:2005 the valve also conforms to:-</p> 

            <p>EN12266-1  Testing of metallic valves.  Pressure tests, test procedures and acceptance criteria.  Mandatory requirements Table A5 for DN30 (30mm) valve for testing with gas.</p> 
        </div>

        <div class="box__section sig-section">
            <img src="/img/tjp.jpg" alt="Trevor Poulter Signiture">

            <ul class="name-date">
                <li>Trevor J Poulter - Director</li>
                <li>February 2018</li>
            </ul>

        </div>

        <div class="valve-actions">
            <div class="btn-pair">
                <input class="btn btn--primary btn--lg" type="button" onClick="window.print()" value="Print"/>
                <a href="{{ URL::previous() }}" class="btn btn--secondary btn--lg">Go Back</a>
            </div>
        </div>

    </div>
</div>
@endsection
