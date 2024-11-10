<x-mail::message>
# New inquiry received:

**Name:** {{ $name }}<br>
**Email:** {{ $email }}<br>
**Message:**<br>
{{ $message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
