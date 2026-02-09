@extends('layouts.mail')

@section('header', 'Welcome!')

@section('content')
<p style="font-size:16px;color:#333;">Hello {{ $user->name }},</p>
<p style="font-size:14px;color:#555;">
    We’re excited to have you join Stone Bazaar. Your account has been successfully created.
</p>
<p style="font-size:14px;color:#555;">
    <a href="{{ url('/') }}" style="color:#3498db;">Visit Website</a>
</p>
@endsection