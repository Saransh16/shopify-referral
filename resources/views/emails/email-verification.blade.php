@component('mail::message')
Hi {{$user->first_name}}!

Thanks for signing up. Please click on the following button to verify your account.

@component('mail::button', ['url' => $user->email_verification_url])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
