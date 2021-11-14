@component('mail::message')
# {{ $details['senderName'] }} ส่งต่อประสบการณ์ความสนุกให้ {{ $details['receiveName'] }}

<body>
    <div style="font-size: 20px;">{{ $details['body']}}</div>
    <img src="{{ $details['img-url']}}">
</body>

@component('mail::button', ['url' => 'https://www.redcrossfair.com/'])
เข้าชมนิทรรศการออนไลน์
@endcomponent

ขอเชิญร่วมสนุกได้ที่งานกาชาดออนไลน์ <a href="https://twitter.com/hashtag/RedcrossKUPostcard" style="text-decoration: none;">#RedcrossKUPostcard</a><br>
จาก: {{ $details['senderName']}}
@endcomponent