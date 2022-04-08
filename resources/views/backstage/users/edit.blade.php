@extends('backstage.templates.backstage')

@section('tools')
    <a href="{{ route('backstage.users.index') }}" class="button-default">Users</a>
@endsection

@section('content')
    <div id="card" class="bg-white shadow-lg mx-auto rounded-b-lg">
        <div class="px-10 pt-4 pb-8">
            <h1>Modify user {{ $user->name }}</h1>
            <form method="POST" action="{{ route('backstage.users.update', $user->id) }}">
                @method('PUT')
                @include('backstage.users.form')
            </form>
        </div>
    </div>
@endsection
