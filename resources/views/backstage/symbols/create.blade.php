@extends('backstage.templates.backstage')

@section('tools')
    <a href="{{ route('backstage.symbols.index') }}" class="button-default">Symbols</a>
@endsection

@section('content')
    <div id="card" class="bg-white shadow-lg mx-auto rounded-b-lg">
        <div class="px-10 pt-4 pb-8">
            <h1>Create a new symbol</h1>
            <form method="POST" action="{{ route('backstage.symbols.store') }}" enctype="multipart/form-data">
                @include('backstage.symbols.form')
            </form>
        </div>
    </div>
@endsection
