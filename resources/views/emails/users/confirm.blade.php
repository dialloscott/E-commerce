@component('mail::message')
# Thank you for Sin up Mr. {{$name}}

We just need you to confirm your email address real quick!
@component('mail::button', ['url' => $url,'color' => 'green'])
Confirmation account
@endcomponent

Thanks Mr. {{$name}},<br>
{{ config('app.name') }}
@endcomponent
