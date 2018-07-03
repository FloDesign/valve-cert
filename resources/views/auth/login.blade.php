@extends('layouts.app')

@section('content')
<div class="container">

    <div class="box box--sm">

        <div class="box__header">
            <h2>{{ __('Log in') }}</h2>
            <div class="box__header__helpertxt">
                Enter your login details below
            </div> 
        </div>

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            <div class="standard-input-container">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="standard-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="standard-input-container">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <input id="password" type="password" class="standard-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>

            <div class="btn-pair">
                <button type="submit" class="btn btn--primary btn--lg">
                    {{ __('Log in') }}
                </button>

                <a class="btn btn--secondary btn--lg" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>

        </form>

    </div>

</div>
@endsection
