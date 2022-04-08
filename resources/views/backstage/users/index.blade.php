@extends('backstage.templates.backstage')

@section('tools')

    @if( auth()->user()->isAdmin() )
    <a href="{{ route('backstage.users.create') }}" class="button-create">Create user</a>
    @endif
@endsection

@section('content')
    <div id="card" class="bg-white shadow-lg mx-auto rounded-b-lg">
        <div class="px-10 pt-4 pb-8">
            @livewire('backstage.user-table')
        </div>
    </div>
@endsection
