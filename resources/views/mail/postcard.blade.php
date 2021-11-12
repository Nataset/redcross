@component('mail::message')
# Introduction

<body>
    The body of your message.
    {{ $details['body'] }}
    <img src="{{ $details['img-url']}}" alt="">
</body>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent