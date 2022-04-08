@extends('backstage.templates.auth')

@section('content')
    <div class="font-bold text-xl mb-6">Login</div>

    <form class="max-w-sm mx-auto" method="POST" action="{{ route('login') }}">
        {{ csrf_field()  }}

        <div class="input-holder {{ $errors->has('email') ? 'has-error' : '' }}">
            <input id="email" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
            </svg>
            @if ($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="input-holder {{ $errors->has('password') ? 'has-error' : '' }}">
            <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="lock-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M224 412c-15.5 0-28-12.5-28-28v-64c0-15.5 12.5-28 28-28s28 12.5 28 28v64c0 15.5-12.5 28-28 28zm224-172v224c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V240c0-26.5 21.5-48 48-48h32v-48C80 64.5 144.8-.2 224.4 0 304 .2 368 65.8 368 145.4V192h32c26.5 0 48 21.5 48 48zm-320-48h192v-48c0-52.9-43.1-96-96-96s-96 43.1-96 96v48zm272 48H48v224h352V240z"></path>
            </svg>
            @if ($errors->has('password'))
                <p class="error">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="text-center">
            <button class="submit-button" type="submit">
                Login
            </button>
        </div>

        <div class="text-center pt-4">
            <a class=" font-light text-xs text-blue" href="{{ route('password.request') }}">Forgot your Password?</a>
        </div>

    </form>
@endsection
