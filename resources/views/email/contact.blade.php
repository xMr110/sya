@component('mail::message')

    You received a message from : {{ $data['email'] }}


    Name: {{ $data['name'] }}


    Email: {{ $data['email'] }}

    Phone: {{ $data['phone'] }}


    Message: {{ $data['message'] }}

    {{--# رسالة اتصل بنا--}}

    {{--قام {{ $data['name'] }} صاحب البريد الالكتروني {{ $data['email'] }}   بإرسال الرسالة التالية :--}}

    {{--{{ $data['message'] }}--}}


@endcomponent
