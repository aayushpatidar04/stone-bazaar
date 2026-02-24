<!DOCTYPE html>
<html>
@php
    $relativeLogoPath = str_replace(url('/'), '', $architect->architect->logo);
    $relativeBannerPath = str_replace(url('/'), '', $architect->architect->banner);
    $logoPath = str_replace('\\', '/', public_path($relativeLogoPath));
    $bannerPath = str_replace('\\', '/', public_path($relativeBannerPath));
@endphp

<head>
    <meta charset="utf-8">
    <title>{{ $architect->name }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .cover {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .cover .background {
            width: 100%;
            height: 100%;
            background: url({{ $bannerPath }}) no-repeat;
            background-size: 891mm 630mm;
            z-index: -1;
            text-align: center;
        }
        .cover .background2 {
            width: 100%;
            height: 100%;
            background: url({{ $bannerPath }}) no-repeat;
            background-size: 891mm 630mm;
            z-index: -1;
            text-align: center;
        }

        h2 {
            border-bottom: 2px solid #444;
            margin-top: 30px;
        }

        .details {
            margin: 20px;
        }

        .details li {
            margin: 5px 0;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        .gallery img {
            width: 48%;
            margin: 1%;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #666;
            padding: 20px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <!-- Cover Page -->
    <div class="cover">
        <div class="background">
            <div class="logo">
                <img src="{{ $logoPath }}" alt="{{ $architect->architect->firm_name }}" style="max-width: 600px; height:auto;">
            </div>
        </div>
    </div>

    <pagebreak />

    @if ($architect->architect->description)
        
        <table style="width:100%; border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:50%; vertical-align:top; padding:0;">
                        <table style="width:100%; border-collapse:collapse;">
                            @if ($architect->architect->about_section_image)
                                @php
                                    $relativePath = str_replace(url('/'), '', $architect->architect->about_section_image);
                                    $path = str_replace('\\', '/', public_path($relativePath));
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ $path }}"
                                            style="width:140mm; height:210mm; object-fit:cover;">
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </td>
                    
                    <!-- Right column: sliced images -->
                    <td style="width:50%; padding:20px; text-align:center;">
                        <div style="text-align:center; margin-bottom:10px;">
                            <p style="font-size:50px; font-family:Georgia, 'Times New Roman', Times, serif;">ABOUT</p>
                        </div>
                        <!-- Left column: text -->
                        <div style="font-size: 30px;">
                            {!! $architect->architect->description !!}
                        </div>
                    </td>
                    
                </tr>
            </tbody>
        </table>


        <pagebreak />
    @endif

    

    <div style="text-align: center; page-break-inside: avoid;">
        <p style="font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif; margin: 15px auto;">GALLERY
        </p>
        @php
            $otherImages = $architect->architectGallery;
        @endphp
        @foreach ($otherImages as $image)
            @php
                $relativePath = str_replace(url('/'), '', $image['image']);
                $path = str_replace('\\', '/', public_path($relativePath));
            @endphp
            <img src="{{ $path }}" alt="{{ $architect->architect->firm_name }}" style="height: 185mm; width: auto;">
        @endforeach
    </div>

    <pagebreak />

    <div class="cover">
        <div class="background" style="padding: 40px;">
            <h2 style="font-size: 40px; margin-bottom: 20px; font-family:Georgia, 'Times New Roman', Times, serif;">
                Connect With Our Stone Experts</h2>
            <p style="font-size: 20px; margin: 10px 0;">
                <b style="color:#ffd700;">+91 987 654 3210</b>
            </p>

            <div style="display: flex; justify-content: center; font-size: 14px;">
                <div style="flex:1; padding: 10px;">
                    <h4 style="font-size: 20px; margin-bottom: 5px; color:#ffd700;">Delhi (Showroom)</h4>
                    <p>A - 1/B, Mayapuri Industrial Area Phase - 1,<br>New Delhi - 110064</p>
                </div>
                <div style="flex:1; padding: 10px;">
                    <h4 style="font-size: 20px; margin-bottom: 5px; color:#ffd700;">Gurugram (Warehouse)</h4>
                    <p>42nd Milestone, NH - 48, Opposite Hyatt,<br>Gurugram, Haryana - 122004</p>
                </div>
                <div style="flex:1; padding: 10px;">
                    <h4 style="font-size: 20px; margin-bottom: 5px; color:#ffd700;">Kishangarh (Corporate Office)</h4>
                    <p>Makrana Road, Madanganj - Kishangarh - 305801,<br>District Ajmer (Rajasthan) India<br>Tel :
                        +91- 9352703082, 260101</p>
                </div>
            </div>

            <p style="margin-top: 40px; font-size: 12px;">© 2026 Stone Bazaar — All Rights Reserved</p>
        </div>
    </div>


</body>

</html>
