<!DOCTYPE html>
<html>
@php
    $seller = $product->subcategory->domain->user->seller;
    $relativeLogoPath = str_replace(url('/'), '', $seller->logo);
    $relativeBannerPath = str_replace(url('/'), '', $seller->banner);
    $logoPath = str_replace('\\', '/', public_path($relativeLogoPath));
    $bannerPath = str_replace('\\', '/', public_path($relativeBannerPath));
@endphp

<head>
    <meta charset="utf-8">
    <title>{{ $product->name }}</title>
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
            background: url({{ public_path('assets/images/Statuario.jpg') }}) no-repeat;
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
            <div class="logo" style="padding-top: 80mm;">
                <img src="{{ $logoPath }}" alt="{{ $seller->business_name }}" style="max-width: 600px; height:auto;">
            </div>
        </div>
    </div>

    <pagebreak />

    @if ($seller->description)
        
        <table style="width:100%; border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:50%; padding:20px; text-align:center;">
                        <div style="text-align:center; margin-bottom:10px;">
                            <p style="font-size:50px; font-family:Georgia, 'Times New Roman', Times, serif;">ABOUT</p>
                        </div>
                        <!-- Left column: text -->
                        <div style="font-size: 30px;">
                            {!! $seller->description !!}
                        </div>
                    </td>

                    <!-- Right column: sliced images -->
                    <td style="width:50%; vertical-align:top; padding:0;">
                        <table style="width:100%; border-collapse:collapse;">
                            @if ($seller->office_image)
                                @php
                                    $relativePath = str_replace(url('/'), '', $seller->office_image);
                                    $path = str_replace('\\', '/', public_path($relativePath));
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ $path }}"
                                            style="width:140mm; height:105mm; object-fit:cover;">
                                    </td>
                                </tr>
                            @endif

                            @if ($seller->warehouse_image)
                                @php
                                    $relativePath = str_replace(url('/'), '', $seller->warehouse_image);
                                    $path = str_replace('\\', '/', public_path($relativePath));
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ $path }}"
                                            style="width:140mm; height:105mm; object-fit:cover;">
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>


        <pagebreak />
    @endif

    @if ($seller->warehouse_image)
        <div style="text-align: center; page-break-inside: avoid;">
            <p style="font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif;">We’ve INDIA’S LARGEST
                COLLECTION OF PREMIUM IMPORTED MARBLE</p>
            @php
                $relativePath = str_replace(url('/'), '', $seller->warehouse_image);
                $path = str_replace('\\', '/', public_path($relativePath));
            @endphp
            <img src="{{ $path }}" alt="" style="height: 170mm; width:auto;">

        </div>

        <pagebreak />
    @endif

    <div>
        @php
            $displayImage = collect($product->images)->firstWhere('type', 'display');
            $relativePath = str_replace(url('/'), '', $displayImage['image']);
            $path = str_replace('\\', '/', public_path($relativePath));
        @endphp
        <img src="{{ $path }}" alt="{{ $seller->business_name }}" style="width: 297mm; height:160mm;">
    </div>
    <div style="text-align: center;">
        <p
            style="font-size: 40px; font-family:'Georgia, 'Times New Roman', Times, serif; padding-bottom: 0px; margin-bottom: 0px;">
            <b>{{ $product->name }}</b>
        </p>
        <p
            style="font-size: 30px; font-family:'Georgia, 'Times New Roman', Times, serif; padding-top: 0px; margin-top: 0px;">
            Thickness : {{ $product->thickness }}</p>
    </div>

    <pagebreak />

    <div style="text-align: center; page-break-inside: avoid;">
        <p style="font-size: 50px; font-family: Georgia, 'Times New Roman', Times, serif; margin: 15px auto;">GALLERY
        </p>
        @php
            $otherImages = collect($product->images)->where('type', 'other');
        @endphp
        @foreach ($otherImages as $image)
            @php
                $relativePath = str_replace(url('/'), '', $image['image']);
                $path = str_replace('\\', '/', public_path($relativePath));
            @endphp
            <img src="{{ $path }}" alt="{{ $seller->business_name }}" style="height: 185mm; width: auto;">
        @endforeach
    </div>

    <pagebreak />

    @php
        $rows = 0;
        if (!empty($product->finishes)) {
            $rows++;
        }
        if (!empty($product->sizes)) {
            $rows++;
        }
        if (!empty($product->thickness)) {
            $rows++;
        }
        if (!empty($product->color)) {
            $rows++;
        }
        if (!empty($product->usage_area)) {
            $rows++;
        }
    @endphp
    @if ($rows >= 2)
        <div class="cover">
            <div class="background2" style="padding: 40px;">
                <div style="text-align:center; margin-bottom:20px;">
                    <p style="font-size:50px; font-family:Georgia, 'Times New Roman', Times, serif;">Details</p>
                </div>
        
                <div style="padding: 0 100px;">
                    <table
                        style="width:100%; border-collapse:collapse; font-family:'Helvetica Neue', Arial, sans-serif; font-size:16px;">
                        @if ($product->finishes)
                            <tr style="background:#f5f5f5;">
                                <td style="padding:12px; border:1px solid #ddd; font-weight:bold;">Finishes</td>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    {{ implode(', ', array_column($product->finishes, 'value')) }}
                                </td>
                            </tr>
                        @endif
                        @if ($product->sizes)
                            <tr>
                                <td style="padding:12px; border:1px solid #ddd; font-weight:bold;">Sizes</td>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    {{ implode(', ', array_column($product->sizes, 'value')) }}
                                </td>
                            </tr>
                        @endif
                        @if ($product->thickness)
                            <tr style="background:#f5f5f5;">
                                <td style="padding:12px; border:1px solid #ddd; font-weight:bold;">Thickness</td>
                                <td style="padding:12px; border:1px solid #ddd;">{{ $product->thickness }}</td>
                            </tr>
                        @endif
                        @if ($product->color)
                            <tr>
                                <td style="padding:12px; border:1px solid #ddd; font-weight:bold;">Color</td>
                                <td style="padding:12px; border:1px solid #ddd;">{{ $product->color }}</td>
                            </tr>
                        @endif
                        @if ($product->usage_area)
                            <tr style="background:#f5f5f5;">
                                <td style="padding:12px; border:1px solid #ddd; font-weight:bold;">Usage Area</td>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    {{ implode(', ', array_column($product->usage_area, 'value')) }}
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <pagebreak />
    @endif

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
                        +91-9876-543210, 260101</p>
                </div>
            </div>

            <p style="margin-top: 40px; font-size: 12px;">© 2026 Stone Bazaar — All Rights Reserved</p>
        </div>
    </div>


</body>

</html>
