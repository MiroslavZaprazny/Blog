@component('mail::message')
# Thanks for signing up!

Feel free to delete this email, it is not important.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Yours sincerely,<br>
{{ config('app.name') }}
@endcomponent
