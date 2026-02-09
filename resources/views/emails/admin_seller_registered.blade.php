@extends('layouts.mail')

@section('header', 'New Seller Registration')

@section('content')
    <p style="font-size:16px;color:#333;">Hello Admin,</p>

    <p style="font-size:14px;color:#555;">
        A new seller has successfully registered on Stone Bazaar. Here are the details:
    </p>

    <table width="100%" cellpadding="5" cellspacing="0" style="border-collapse:collapse;font-size:14px;color:#555;">
        <tr>
            <td style="font-weight:bold;">Name:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Email:</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Phone:</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Business Name:</td>
            <td>{{ $seller->business_name }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">GST Number:</td>
            <td>{{ $seller->gst_number }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">City:</td>
            <td>{{ $seller->city }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">State:</td>
            <td>{{ $seller->state }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Pincode:</td>
            <td>{{ $seller->pincode }}</td>
        </tr>
    </table>

    @if($seller->gst_certificate)
        <p style="margin-top:15px;">
            <strong>GST Certificate:</strong>  
            <a href="{{ $seller->gst_certificate }}" target="_blank">View Certificate</a>
        </p>
    @endif

    <p style="font-size:14px;color:#555;margin-top:20px;">
        Please review and approve the seller’s account as needed.
    </p>
@endsection
