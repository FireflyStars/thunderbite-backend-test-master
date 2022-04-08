@csrf

<div class="border-t border-b border-gray-300 py-4">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        Personal Information
    </h3>
    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
        Use a permanent address where you can receive mail.
    </p>
</div>

@include('backstage.partials.forms.text', [
    'field' => 'name',
    'label' => 'Name',
    'value' => old('name') ?? $user->name,
])

@include('backstage.partials.forms.text', [
    'field' => 'username',
    'label' => 'Username',
    'value' => old('username') ?? $user->username,
])

@include('backstage.partials.forms.email', [
    'field' => 'email',
    'label' => 'E-Mail Address',
    'value' => old('email') ?? $user->email,
])

@include('backstage.partials.forms.select', [
    'field' => 'level',
    'label' => 'Level',
    'value' => old('level') ?? $user->level,
    'options' => [
        'admin' => 'Admin',
        'download' => 'Read only &amp; List download',
        'read' => 'Read Only',
    ]
])

@if( $user->id === auth()->user()->id )

    <div class="border-t border-b border-gray-300 mt-8 py-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Password
        </h3>
        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            Make sure your password is at least 8 characters long.
        </p>
    </div>

    @include('backstage.partials.forms.password', [
        'field' => 'current_password',
        'label' => 'Current password',
    ])

    @include('backstage.partials.forms.password', [
        'field' => 'password',
        'label' => 'New password',
    ])

    @include('backstage.partials.forms.password', [
        'field' => 'password_confirmation',
        'label' => 'Confirm new password',
    ])

@endif

@include('backstage.partials.forms.submit')
