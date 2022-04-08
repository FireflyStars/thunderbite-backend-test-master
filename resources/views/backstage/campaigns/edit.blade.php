@extends('backstage.templates.backstage')

@section('tools')
    <a href="{{ route('backstage.campaigns.index') }}" class="button-default">Campaigns</a>
@endsection

@section('content')
    <div id="card" class="bg-white shadow-lg mx-auto rounded-b-lg">
        <div class="px-10 pt-4 pb-8">
            <h1>Modify campaign {{ $campaign->name }}</h1>
            <form method="POST" action="{{ route('backstage.campaigns.update', $campaign->id) }}">
                @method('PUT')
                @include('backstage.campaigns.form')
            </form>
        </div>
    </div>
@endsection
