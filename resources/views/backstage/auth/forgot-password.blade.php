@extends('backstage.templates.auth')

@section('content')
    <div class="font-bold text-xl mb-6">Password reset</div>

    <form class="max-w-sm mx-auto" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field()  }}

        <div class="input-holder {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" autofocus>
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
            </svg>
            @if ($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="text-center">
            <button class="submit-button" type="submit">
                Send password reset link
            </button>
        </div>

        <div class="text-center pt-4">
            <a class=" font-light text-xs text-blue" href="{{ route('login') }}">Back to login</a>
        </div>

    </form>
@endsection
