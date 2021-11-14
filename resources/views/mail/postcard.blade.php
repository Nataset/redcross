@component('mail::message')
# ส่งต่อประสบการณ์ความสนุกให้ {{ $details['receiveName'] }}

<body>
    <label style="font-size: 20px;" class="mb-5">{{ $details['body']}}</label>
    <img src="{{ $details['img-url']}}" alt="">
</body>

@component('mail::button', ['url' => ''])
เข้าชมนิทรรศการออนไลน์
@endcomponent

เชิญร่วมสนุกได้ที่งานกาชาดออนไลน์ url RedcrossKUPostcard<br>
จาก: {{ $details['senderName']}}
@endcomponent