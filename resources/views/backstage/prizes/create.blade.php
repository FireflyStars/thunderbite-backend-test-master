@extends('backstage.templates.backstage')

@section('tools')
    <a href="{{ route('backstage.prizes.index') }}" class="button-default">Prizes</a>
@endsection

@section('content')
    <div id="card" class="bg-white shadow-lg mx-auto rounded-b-lg">
        <div class="px-10 pt-4 pb-8">
            <h1>Add a new prize</h1>
            <form method="POST" action="{{ route('backstage.prizes.store') }}" enctype="multipart/form-data">
                @include('backstage.prizes.form')

            </form>
        </div>
    </div>
@endsection
