@extends('backstage.templates.backstage')

@section('content')
    <div id="card" class="bg-white shadow-lg mx-auto rounded-b-lg">
        <div class="px-10 pt-4 pb-8">
            <h1>Dashboard</h1>
            <p>Hello, {{ auth()->user()->name }}</p>
            <p>Welcome to the administration area of {{ config('app.name') }}!</p>
            <p>To get started, select a campaign on the left side of your screen.</p>


        </div>
    </div>
@endsection
