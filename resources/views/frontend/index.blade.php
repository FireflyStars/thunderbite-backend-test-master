<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ mix('/css/backstage.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    @livewire('frontend.slot-machine', ['spin_limit'=> $spin_limit])
    <script src="{{ mix('/js/backstage.js') }}"></script>

    @livewireScripts
    @stack('js')
</body>
</html>
