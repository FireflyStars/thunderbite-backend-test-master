@component('mail::message')

# Hi {{ $user['name'] }},

You have just been added as a user to the administration section of {{ config('app.name') }}.

Please use the link below to get started.

@component('mail::panel')
Username: {{ $user['email'] }}<br />
@endcomponent

@component('mail::button', ['url' => secure_url('/backstage/activate/'.$user['ott'])])
Activate your account
@endcomponent

Have a great day,<br>
{{ config('app.name') }}


@component('mail::subcopy')
If you’re having trouble clicking the "Activate your account" button, copy and paste the URL below into your web browser:

{{ secure_url('/backstage/activate/'.$user['ott']) }}
@endcomponent
@endcomponent