@component('mail::message')
# Hello {{$data->name}}, please verify your account!

Click the button to verify your account

@component('mail::button', ['url' => $link])
Verify
@endcomponent
</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
