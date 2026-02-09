<!DOCTYPE html>
<html lang="en">



<head>
    <title>Stone Bazaar - Sign Up </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/menu-search/css/component.css') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/pages/multi-step-sign-up/css/reset.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/multi-step-sign-up/css/style.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/style.min.css') }}">


</head>

<body class="multi-step-sign-up">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    @php
        $alerts = [];

        if (session('success')) {
            $alerts[] = ['type' => 'success', 'message' => session('success')];
        }

        if (session('error')) {
            $alerts[] = ['type' => 'error', 'message' => session('error')];
        }

        if ($errors->any()) {
            $alerts[] = [
                'type' => 'error',
                'message' => '<ol>' . collect($errors->all())->map(fn($e) => "<li>$e</li>")->implode('') . '</ol>',
                'isHtml' => true,
            ];
        }
    @endphp

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertTypes = {
                success: 'alert-solid-success border border-success',
                error: 'alert-solid-danger border border-danger'
            };

            const container = document.getElementById('alert-container');

            @foreach ($alerts as $alert)
                (function() {
                    const alertHtml = `
                    <div class="card border-0 mb-2 fade-in">
                        <div class="alert ${alertTypes["{{ $alert['type'] }}"]} mb-0 p-3">
                            <div class="d-flex align-items-start">
                                <div class="text-fixed-white w-100">
                                    <div class="d-flex justify-content-between">
                                        <span>{!! $alert['isHtml'] ?? false ? $alert['message'] : e($alert['message']) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = alertHtml;
                    const alertElement = tempDiv.firstElementChild;
                    container.appendChild(alertElement);

                    setTimeout(() => {
                        alertElement.classList.add('fade-out');
                        setTimeout(() => alertElement.remove(), 500);
                    }, 5000);
                })();
            @endforeach
        });
    </script>

    <form id="msform" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Business Details</li>
            <li>Location Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <img class="logo" src="{{ asset('assets/images/logo.png') }}" alt="Stone Bazaar"
                style="width:200px; height: auto;">
            <input type="hidden" name="role" value="Seller"/>
            <h3 class="fs-subtitle">Let’s have a new beginning. Sign up for new you</h3>
            <div class="input-group">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Username" value="{{ old('name') }}" required autocomplete="name" autofocus />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group">
                <input type="tel" pattern="[6-9][0-9]{9}" maxlength="10" minlength="10"
                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                    placeholder="Phone Number" value="{{ old('phone_number') }}" required
                    autocomplete="phone-number" />
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    placeholder="Password" required autocomplete="new-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" required autocomplete="new-password" />
            </div>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
            <img class="logo" src="{{ asset('assets/images/logo.png') }}" alt="Stone Bazaar"
                style="width: 200px; height: auto;">

            <h3 class="fs-subtitle">Little bit about your business</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="business_name" value="{{ old('business_name') }}"
                    placeholder="Business Name" required />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="gst_number" value="{{ old('gst_number') }}"
                    placeholder="GST Number" required />
            </div>
            <div class="mb-3">
                <label for="gst-certificate">GST Certificate</label>
                <input type="file" id="gst-certificate" class="form-control" name="gst_certificate" />
            </div>
            <button type="button" name="previous" class="btn btn-inverse previous"
                value="Previous">Previous</button>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
            <img class="logo" src="{{ asset('assets/images/logo.png') }}" alt="Stone Bazaar"
                style="width:200px; height: auto;">

            <h3 class="fs-subtitle">And something about your location!</h3>
            <div class="input-group">
                <textarea name="address" class="form-control" placeholder="Address" required>{{ old('address') }}</textarea>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                    placeholder="City" required />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="state" value="{{ old('state') }}"
                    placeholder="State" required />
            </div>
            <div class="input-group">
                <input type="number" class="form-control" pattern="[0-9]{6}" name="pincode" maxlength="6"
                    minlength="6" value="{{ old('pincode') }}" placeholder="Pincode" required />
            </div>

            <button type="button" name="previous" class="btn btn-inverse previous"
                value="Previous">Previous</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

    <div id="alert-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;"></div>
    <!-- Required Jquery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <script src="{{ asset('assets/pages/multi-step-sign-up/js/main.js') }}"></script>
    <!-- i18next.min.js -->
    <script src="{{ asset('plugins/i18next/dist/umd/i18next.min.js') }}"></script>
    <script src="{{ asset('plugins/i18next-http-backend/i18nextHttpBackend.min.js') }}"></script>
    <script src="{{ asset('plugins/i18next-browser-languagedetector/dist/umd/i18nextBrowserLanguageDetector.min.js') }}">
    </script>
    <script src="{{ asset('plugins/jquery-i18next/jquery-i18next.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-pages.js') }}"></script>
    <script>
        function showAlert(type, message) {
            const alertTypes = {
                success: 'alert-solid-success border border-success',
                error: 'alert-solid-danger border border-danger'
            };

            const alertHtml = `
                <div class="card border-0 mb-2 fade-in">
                    <div class="alert ${alertTypes[type]} mb-0 p-3">
                        <div class="d-flex align-items-start">
                            <div class="text-fixed-white w-100">
                                <div class="d-flex justify-content-between">
                                    <span>${message}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

            const container = document.getElementById('alert-container');
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = alertHtml;

            const alertElement = tempDiv.firstElementChild;
            container.appendChild(alertElement);

            // Auto remove after 5 seconds
            setTimeout(() => {
                alertElement.classList.add('fade-out');
                setTimeout(() => alertElement.remove(), 500);
            }, 5000);
        }
    </script>

</body>



</html>
