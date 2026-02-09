@extends('layouts.mail')

@section('header', 'New Architect Enquiry Submitted')

@section('content')
    <p style="font-size:16px;color:#333;">Hello Admin,</p>

    <p style="font-size:14px;color:#555;">
        A new enquiry has been submitted on Stone Bazaar. Here are the details:
    </p>

    <table width="100%" cellpadding="5" cellspacing="0" style="border-collapse:collapse;font-size:14px;color:#555;">
        <tr>
            <td style="font-weight:bold;">Name:</td>
            <td>{{ $enquiry->name }}</td>
        </tr>
        @if($enquiry->email)
        <tr>
            <td style="font-weight:bold;">Email:</td>
            <td>{{ $enquiry->email }}</td>
        </tr>
        @endif
        <tr>
            <td style="font-weight:bold;">Phone:</td>
            <td>{{ $enquiry->phone }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Message:</td>
            <td>{{ $enquiry->message }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Architect:</td>
            <td><a href="{{ Route('architect', ['id' => $enquiry->user_id]) }}" target="_blank">{{ $architect->architect->busineess_name ?? $architect->name }}</a></td>
        </tr>
    </table>

    <p style="font-size:14px;color:#555;margin-top:20px;">
        Please review and do the needful.
    </p>
@endsection
