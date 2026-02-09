@extends('layouts.mail')

@section('header', 'New Seller Registration')

@section('content')
    <p style="font-size:16px;color:#333;">Hello Admin,</p>

    <p style="font-size:14px;color:#555;">
        A new architect has successfully registered on Stone Bazaar. Here are the details:
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
            <td style="font-weight:bold;">Firm Name:</td>
            <td>{{ $architect->firm_name }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Specialization:</td>
            <td>{{ $architect->specialization }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Years of Experience:</td>
            <td>{{ $architect->years_of_experience }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">City:</td>
            <td>{{ $architect->city }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">State:</td>
            <td>{{ $architect->state }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;">Pincode:</td>
            <td>{{ $architect->pincode }}</td>
        </tr>
    </table>

    @if($architect->portfolio)
        <p style="margin-top:15px;">
            <strong>Portfolio:</strong>  
            <a href="{{ $architect->portfolio }}" target="_blank">View Portfolio</a>
        </p>
    @endif

    <p style="font-size:14px;color:#555;margin-top:20px;">
        Please review and approve the architect's account as needed.
    </p>
@endsection
