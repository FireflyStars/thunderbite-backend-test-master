<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Thunderbite</title>
    <link href="{{ mix('/css/backstage.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            align-items: center;
            display: flex;
            justify-content: center;
        }


        #logo {
            max-width: 100%;
            width: 200px;
        }
    </style>

</head>

<body>

<svg id="logo" viewBox="0 0 212 241" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M409.333 365.552a.04.04 0 01-.024-.009l.024.009z" fill="url(#_Linear1)" transform="translate(-317.778 -127.596)"/><path d="M409.412 365.564a.276.276 0 01-.079-.012c2.364.005 16.647-236.263 16.647-236.263s-10.234 236.279-16.568 236.275zm-.103-.021c-.582-.24-1.15-.828-1.704-1.713.559.709 1.127 1.284 1.704 1.713z" fill="url(#_Linear2)" transform="translate(-317.778 -127.596)"/><path d="M526.49 240.936c7.354-8.885 1.035-22.319-10.496-22.319H445.77c-5.331 0-4.549-1.575-4.537-6.905l.18-73.137c.024-9.799-12.226-14.264-18.511-6.746L320.956 253.743c-7.37 8.814-1.102 22.226 10.387 22.226h69.751c5.336 0 4.554 4.321 4.564 9.657l.14 72.091c.019 9.794 12.283 14.2 18.528 6.654L526.49 240.936z" fill="url(#_Linear3)" transform="translate(-317.778 -127.596)"/><path d="M198.216 91.021h-70.224c-2.399 0-3.56-.319-4.111-1.156l-57.337 38.681h8.713s4.195.145 11.217.062c25.902-.307 90.264-3.723 124.391-29.026-2.174-6.949-11.445-8.561-12.649-8.561z" fill="#ffd821" fill-rule="nonzero"/><path d="M441.273 194.928l-5.484 1.043 5.484-1.043z" fill="url(#_Linear4)" transform="translate(-317.778 -127.596)"/><path d="M379.408 256.142c8.003-5.591 37.77-49.155 48.263-80.628 6.13-18.388 13.995-41.734 6.522-46.9-3.273-2.264-8.237-.438-11.291 3.215L320.956 253.743c-7.37 8.814-1.102 22.226 10.387 22.226 0 0 19.675 0 48.065-19.827z" fill="url(#_Linear5)" transform="translate(-317.778 -127.596)"/><path d="M429.981 127.675c-2.458.319-4.954 1.601-7.079 4.154 1.908-2.281 4.559-3.85 7.079-4.154z" fill="url(#_Linear6)" transform="translate(-317.778 -127.596)"/><path d="M441.233 211.712l.18-73.137c.017-6.889-5.599-11.652-11.423-10.901 1.512-.182 2.976.09 4.203.94 7.473 5.166-.392 28.512-6.522 46.9-8.814 26.433-31.214 61.383-42.907 75.217l-.442 5.411 57.344-38.684c-.676-1.022-.441-2.815-.433-5.746z" fill="url(#_Linear7)" transform="translate(-317.778 -127.596)"/><path d="M384.311 256.142c10.242-10.212 34.835-49.662 44.496-78.641 5.561-16.682 11.615-39.08 7.11-46.95 4.273 7.606-2.696 28.315-8.246 44.963-8.043 24.123-37.267 75.312-52.685 83.598l-.004.003s111.401 6.168 153.661-31.937c-36.209 26.846-101.542 28.964-144.332 28.964z" fill="url(#_Linear8)" transform="translate(-317.778 -127.596)"/><path d="M451.78 307.53c5.194-13.246 19.024-40.001-1.828-36.347-20.657 3.62-48.858 4.786-48.858 4.786 5.336 0 4.554 4.321 4.564 9.657l.14 72.091c.016 8.836 9.987 13.251 16.526 8.498 8.61-10.87 21.272-37.819 29.456-58.685z" fill="url(#_Linear9)" transform="translate(-317.778 -127.596)"/><path d="M454.162 270.881c14.533.723 2.41 24.428-2.382 36.649-8.184 20.866-20.846 47.815-29.456 58.685l-.072.078a10.845 10.845 0 002.074-1.922l5.162-6.235c7.936-13.125 19.958-36.371 26.541-53.153 4.969-12.672 15.492-35.361-1.867-34.102z" fill="url(#_Linear10)" transform="translate(-317.778 -127.596)"/><defs><linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="rotate(140.194 170.633 194.637) scale(370.772)"><stop offset="0" stop-color="#b6b6b6"/><stop offset="1" stop-color="#d9d9d9"/></linearGradient><linearGradient id="_Linear2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="rotate(140.194 170.633 194.637) scale(370.772)"><stop offset="0" stop-color="#b4b4b4"/><stop offset="1" stop-color="#d7d7d7"/></linearGradient><linearGradient id="_Linear3" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="translate(317.778 248.118) scale(211.868)"><stop offset="0" stop-color="#f05923"/><stop offset=".7" stop-color="#fef301"/><stop offset=".8" stop-color="#feee0c"/><stop offset="1" stop-color="#fbb03b"/></linearGradient><linearGradient id="_Linear4" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="translate(435.789 195.45) scale(5.48438)"><stop offset="0" stop-color="#ff0"/><stop offset=".1" stop-color="#ffff3c"/><stop offset=".2" stop-color="#ffff8a"/><stop offset=".3" stop-color="#ffffc4"/><stop offset=".4" stop-color="#ffffe9"/><stop offset=".6" stop-color="#fffffd"/><stop offset=".7" stop-color="#ffffe7"/><stop offset=".8" stop-color="#ffffb6"/><stop offset=".9" stop-color="#ffff69"/><stop offset="1" stop-color="#ff0"/></linearGradient><linearGradient id="_Linear5" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="rotate(175.419 216.218 107.335) scale(266.5837)"><stop offset="0" stop-color="#f05923"/><stop offset=".15" stop-color="#f9a437"/><stop offset=".5" stop-color="#fbb03b"/><stop offset=".65" stop-color="#f9a437"/><stop offset="1" stop-color="#fbb03b"/></linearGradient><linearGradient id="_Linear6" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="scale(-3.62735) rotate(-86.186 -77.713 45.144)"><stop offset="0" stop-color="#ffd821"/><stop offset="1" stop-color="#f69c18"/></linearGradient><linearGradient id="_Linear7" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="scale(-103.26472) rotate(-86.186 -2.824 1.42)"><stop offset="0" stop-color="#ffd821"/><stop offset="1" stop-color="#f69c18"/></linearGradient><linearGradient id="_Linear8" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="translate(374.982 195.018) scale(153.66)"><stop offset="0" stop-color="#ff0"/><stop offset=".1" stop-color="#ffff3c"/><stop offset=".2" stop-color="#ffff8a"/><stop offset=".3" stop-color="#ffffc4"/><stop offset=".4" stop-color="#ffffe9"/><stop offset=".6" stop-color="#fffffd"/><stop offset=".7" stop-color="#ffffe7"/><stop offset=".8" stop-color="#ffffb6"/><stop offset=".9" stop-color="#ffff69"/><stop offset="1" stop-color="#ff0"/></linearGradient><linearGradient id="_Linear9" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="scale(-59.27592) rotate(-80.627 -6.392 1.951)"><stop offset="0" stop-color="#f05923"/><stop offset=".9" stop-color="#f9a530"/><stop offset="1" stop-color="#fbb03b"/></linearGradient><linearGradient id="_Linear10" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="scale(-90.0727) rotate(-78.071 -4.384 1.597)"><stop offset="0" stop-color="#f6931d"/><stop offset="1" stop-color="#ff0"/></linearGradient></defs></svg>
<script src="{{ mix('/js/backstage.js') }}"></script>
<script>
@if( Session::has('error') )
    swal({
        title: "Error",
        text: "{{ Session::get('error') }}",
        timer: 3000,
        button: false,
        icon: 'error'
    });
@endif
</script>
</body>

</html>
