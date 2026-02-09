@extends('layouts.mail')

@section('header', 'Enquiry Submitted')

@section('content')
    <p style="font-size:16px;color:#333;">Hello {{ $enquiry->name }},</p>

    <p style="font-size:14px;color:#555;">
        Thank you for contacting us. We have received your message and our team will get back to you shortly.
    </p>

    <p style="font-size:14px;color:#555;">
        <a href="{{ url('/') }}" style="color:#3498db;">Visit Website</a>
    </p>
@endsection
