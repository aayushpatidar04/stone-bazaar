<!DOCTYPE html>
<html lang="en">


<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Stone Bazaar | Verified Stones, Trusted Connections - The Digital Marketplace for Marble & Granite.">
    <meta name="keywords"
        content="Stone Bazaar | Verified Stones, Trusted Connections - The Digital Marketplace for Marble & Granite.">
    <meta name="author" content="Aayush Patidar">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fortawesome/fontawesome-free/css/all.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">

    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datedropper/datedropper.min.css') }}" />

    <!-- Data Table Css -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.html">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/component.css') }}">
    <!-- GLightbox - modern vanilla JS lightbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/glightbox/dist/css/glightbox.min.css') }}">
    <!-- hover-effect.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/hover-effect/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/hover-effect/set2.css') }}">
    @yield('css-content')
    <style>
        #notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            max-width: 500px;
        }

        .notification-card {
            animation: fadeIn 0.3s ease-in-out;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
    </style>
</head>

<body>
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
                success: 'alert-solid-success border border-success bg-success',
                error: 'alert-solid-danger border border-danger bg-danger'
            };

            const container = document.getElementById('alert-container');

            @foreach ($alerts as $alert)
                (function() {
                    const alertHtml = `
                    <div class="card border-0 mb-2 fade-in">
                        <div class="alert text-white ${alertTypes["{{ $alert['type'] }}"]} mb-0 p-3">
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

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{ Route('home') }}">
                            <img class="img-fluid" src="{{ asset('assets/images/logo-white.png') }}"
                                alt="Stone Bazaar" style="width:65px; height:auto;" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-text search-close"><i
                                                class="feather icon-x"></i></span>
                                        <input id="pageSearch" type="text" oninput="debounceHighlight()"
                                            class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-text search-btn"><i
                                                class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="javascript:toggleFullScreen()"
                                    class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="form-label badge bg-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img class="d-flex align-self-center img-radius"
                                                        src="{{ asset('assets/images/avatar-4.jpg') }}"
                                                        alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img class="d-flex align-self-center img-radius"
                                                        src="{{ asset('assets/images/avatar-3.jpg') }}"
                                                        alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img class="d-flex align-self-center img-radius"
                                                        src="{{ asset('assets/images/avatar-4.jpg') }}"
                                                        alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="{{ asset('assets/images/avatar-4.jpg') }}" class="img-radius"
                                            alt="User-Profile-Image">
                                        <span>{{ Auth::user()->name }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        {{-- <li>
                                            <a href="javascript:void(0)">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li> --}}
                                        @if (!Auth::user()->hasRole('Admin'))
                                            <li>
                                                <a href="{{ Route('profile') }}">
                                                    <i class="feather icon-user"></i> Profile
                                                </a>
                                            </li>
                                        @endif
                                        {{-- <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text"
                                            placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="d-flex userlist-box" data-id="1" data-status="online"
                                    data-username="Josephin Doe" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Josephin Doe">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="rounded img-radius img-radius"
                                            src="{{ asset('assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="d-flex userlist-box" data-id="2" data-status="online"
                                    data-username="Lary Doe" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Lary Doe">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="rounded img-radius"
                                            src="{{ asset('assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="d-flex userlist-box" data-id="3" data-status="online"
                                    data-username="Alice" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Alice">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="rounded img-radius"
                                            src="{{ asset('assets/images/avatar-4.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="d-flex userlist-box" data-id="4" data-status="online"
                                    data-username="Alia" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Alia">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="rounded img-radius"
                                            src="{{ asset('assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="d-flex userlist-box" data-id="5" data-status="online"
                                    data-username="Suzen" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Suzen">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="rounded img-radius"
                                            src="{{ asset('assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="d-flex chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="d-flex chat-messages">
                    <div class="flex-shrink-0">
                        <a class="flex-shrink-0 me-3 photo-table" href="javascript:void(0)">
                            <img class="rounded img-radius img-radius m-t-5"
                                src="{{ asset('assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                        </a>
                    </div>
                    <div class="flex-grow-1 chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?
                            </p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex chat-messages">
                    <div class="flex-grow-1 chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?
                            </p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="flex-shrink-0 ms-3 photo-table">
                            <a href="javascript:void(0)">
                                <img class="rounded img-radius img-radius m-t-5"
                                    src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <!-- Dashboard -->
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu" id="dashboard">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li id="dashboard-default">
                                            <a href="{{ Route('home') }}">
                                                <span class="pcoded-mtext">Default</span>
                                            </a>
                                        </li>
                                        <li id="dashboard-crm">
                                            <a href="dashboard-crm.html">
                                                <span class="pcoded-mtext">CRM</span>
                                            </a>
                                        </li>
                                        <li id="dashboard-analytics">
                                            <a href="dashboard-analytics.html">
                                                <span class="pcoded-mtext">Analytics</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @if (!Auth::user()->hasRole('Admin'))
                                    <li id="profile">
                                        <a href="{{ Route('profile') }}">
                                            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                            <span class="pcoded-mtext">Profile</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasRole('Admin'))
                                    <li id="sellers">
                                        <a href="{{ Route('admin.sellers') }}">
                                            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                            <span class="pcoded-mtext">Sellers</span>
                                        </a>
                                    </li>
                                    <li id="architects">
                                        <a href="{{ Route('admin.architects') }}">
                                            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                            <span class="pcoded-mtext">Architects</span>
                                        </a>
                                    </li>
                                    <li id="enquiries">
                                        <a href="{{ Route('enquiries') }}">
                                            <span class="pcoded-micon"><i
                                                    class="fa-regular fa-question-circle"></i></span>
                                            <span class="pcoded-mtext">Enquiries</span>
                                        </a>
                                    </li>
                                    <li id="queries">
                                        <a href="{{ Route('admin.queries') }}">
                                            <span class="pcoded-micon"><i
                                                    class="fa-regular fa-question-circle"></i></span>
                                            <span class="pcoded-mtext">Support Queries</span>
                                        </a>
                                    </li>
                                    <li id="plans">
                                        <a href="{{ Route('admin.plans') }}">
                                            <span class="pcoded-micon"><i
                                                    class="fa-regular fa-money-bill-alt"></i></span>
                                            <span class="pcoded-mtext">Subscription Plans</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasRole('Seller'))
                                    <li id="products">
                                        <a href="{{ Route('seller.products') }}">
                                            <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                            <span class="pcoded-mtext">Products</span>
                                        </a>
                                    </li>
                                    <li id="enquiries">
                                        <a href="{{ Route('enquiries') }}">
                                            <span class="pcoded-micon"><i
                                                    class="fa-regular fa-question-circle"></i></span>
                                            <span class="pcoded-mtext">Enquiries</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasRole('Architect'))
                                    <li id="enquiries">
                                        <a href="{{ Route('enquiries') }}">
                                            <span class="pcoded-micon"><i
                                                    class="fa-regular fa-question-circle"></i></span>
                                            <span class="pcoded-mtext">Enquiries</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>






                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    @yield('page-header')
                                    <div class="page-body">
                                        <div class="row">

                                            @yield('content')

                                            <div class="md-overlay"></div>
                                        </div>
                                    </div>
                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="alert-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;"></div>

    <div id="notification-container" class="p-3"></div>

    <!-- Required Jquery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- Chart js -->
    <script src="{{ asset('plugins/chart.js/dist/chart.umd.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset('assets/pages/widget/amchart/amcharts.js') }}"></script>
    <script src="{{ asset('assets/pages/widget/amchart/serial.js') }}"></script>
    <script src="{{ asset('assets/pages/widget/amchart/light.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/js/vartical-layout.min.js') }}"></script>
    <script src="{{ asset('assets/pages/dashboard/custom-dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>


    <!-- data-table js -->
    <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- i18next.min.js -->
    <script src="{{ asset('plugins/i18next/dist/umd/i18next.min.js') }}"></script>
    <script src="{{ asset('plugins/i18next-http-backend/i18nextHttpBackend.min.js') }}"></script>
    <script src="{{ asset('plugins/i18next-browser-languagedetector/dist/umd/i18nextBrowserLanguageDetector.min.js') }}">
    </script>
    <script src="{{ asset('plugins/jquery-i18next/jquery-i18next.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('assets/pages/data-table/js/data-table-custom.js') }}"></script>
    <!-- sweet alert js -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script src="{{ asset('assets/js/modalEffects.js') }}"></script>
    <script src="{{ asset('assets/js/classie.js') }}"></script>
    <!-- GLightbox - modern vanilla JS lightbox -->
    <script src="{{ asset('plugins/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script>
        // Initialize GLightbox
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true
        });
    </script>
    @yield('js-content')
    <script>
        let debounceTimer;

        // Function to clean existing highlights
        function cleanMarks(container) {
            const marks = container.querySelectorAll("mark");

            marks.forEach(mark => {
                // Extract text content and restore it into the original node
                const parent = mark.parentNode;
                parent.replaceChild(document.createTextNode(mark.textContent), mark);
                parent.normalize(); // Merge adjacent text nodes
            });
        }

        // Core function to highlight plain text without touching tags
        function highlightText(node, searchText) {
            if (node.nodeType === 3) { // Text nodes only
                const matchIndex = node.nodeValue.toLowerCase().indexOf(searchText.toLowerCase());
                if (matchIndex !== -1) {
                    const span = document.createElement("mark");
                    const matchedText = node.splitText(matchIndex);
                    const remainingText = matchedText.splitText(searchText.length);
                    span.appendChild(matchedText.cloneNode(true));
                    matchedText.replaceWith(span);
                }
            } else if (node.nodeType === 1 && node.childNodes && !["SCRIPT", "STYLE"].includes(node.tagName)) {
                // Recursively search child nodes
                node.childNodes.forEach(child => highlightText(child, searchText));
            }
        }

        function startHighlight() {
            const input = document.querySelector('#pageSearch');
            const searchText = input.value;
            const contentContainer = document.querySelector('body');

            cleanMarks(contentContainer);

            if (searchText !== "") {
                highlightText(contentContainer, searchText);
            }
        }

        // Debounce to wait 1 sec after typing stops
        function debounceHighlight() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(startHighlight, 1000);
        }

        document.addEventListener("DOMContentLoaded", () => {
            const contentContainer = document.querySelector('body');
            contentContainer.setAttribute("data-original-content", contentContainer.innerHTML);
        });

        function showAlert(type, message) {
            const alertTypes = {
                success: 'alert-solid-success border border-success bg-success',
                error: 'alert-solid-danger border border-danger bg-alert'
            };

            const alertHtml = `
                <div class="card border-0 mb-2 fade-in">
                    <div class="alert text-white ${alertTypes[type]} mb-0 p-3">
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

    <!-- Pusher JS -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <!-- Laravel Echo via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.iife.js"></script>

    <script>

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ config('app.pusher.app_key') }}',
            cluster: '{{ config('app.pusher.app_cluster') }}',
            forceTLS: true,
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            }
        });


        Echo.private(`user.{{ auth()->id() }}`)
            .listen('NewNotification', (e) => {
                showNotification(e);
            });

        function showNotification(notification) {
            const container = document.getElementById('notification-container');
            const alertTypeClass = {
                success: 'alert-success border-success',
                error: 'alert-danger border-danger',
                info: 'alert-info border-info',
                warning: 'alert-warning border-warning'
            };

            const typeClass = alertTypeClass[notification.type] || 'alert-secondary border-secondary';
            const hasLink = notification.data && notification.data.link;

            const alertHtml = `
                <div class="notification-card card shadow-sm mb-3 fade-in border ${typeClass}">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="w-100">
                                <h6 class="mb-1">${notification.title}</h6>
                                <p class="mb-2 text-muted">${notification.body}</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary mark-read-btn" data-id="${notification.id}">Mark as Read</button>
                                    ${hasLink ? `<a href="${notification.data.link}" class="btn btn-sm btn-primary">View</a>` : ''}
                                </div>
                            </div>
                            <button class="btn-close ms-3" aria-label="Close"></button>
                        </div>
                    </div>
                </div>`;

            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = alertHtml;
            const alertElement = tempDiv.firstElementChild;

            // Attach close behavior
            alertElement.querySelector('.btn-close').addEventListener('click', () => {
                // const headerList = document.querySelector('.notification-list');

                // // Calculate time difference in minutes
                // const now = new Date();
                // const rawTimestamp = notification.created_at; // e.g. "2025-08-27 16:40:14"
                // const isoTimestamp = rawTimestamp.replace(' ', 'T'); // → "2025-08-27T16:40:14"
                // const createdAt = new Date(isoTimestamp);
                // const diffMs = now - createdAt;
                // const diffMinutes = Math.floor(diffMs / 60000);

                // // Format time like "5 minutes ago"
                // let timeAgo = '';
                // if (diffMinutes < 1) {
                //     timeAgo = 'just now';
                // } else if (diffMinutes < 60) {
                //     timeAgo = `${diffMinutes} minute${diffMinutes !== 1 ? 's' : ''} ago`;
                // } else if (diffMinutes < 1440) {
                //     const hours = Math.floor(diffMinutes / 60);
                //     timeAgo = `${hours} hour${hours !== 1 ? 's' : ''} ago`;
                // } else {
                //     const days = Math.floor(diffMinutes / 1440);
                //     timeAgo = `${days} day${days !== 1 ? 's' : ''} ago`;
                // }

                // // Create new list item
                // const listItem = document.createElement('li');
                // listItem.classList.add('notification-message');
                // listItem.innerHTML = `
                //     <a href="${notification.data?.link || '#'}">
                //         <div class="media d-flex">
                //             <div class="media-body flex-grow-1">
                //                 <p class="noti-details">
                //                     <strong>${notification.sender?.name || 'System'}</strong>: ${notification.title}
                //                 </p>
                //                 <p class="noti-sub-details">${notification.body}</p>
                //                 <p class="noti-time">${timeAgo}</p>
                //             </div>
                //         </div>
                //     </a>
                // `;

                // // Prepend to header list
                // headerList.insertBefore(listItem, headerList.firstChild);

                // const badge = document.querySelector('.notification-badge');
                // let count = parseInt(badge.textContent);
                // badge.textContent = count + 1;

                // Fade out and remove original alert
                alertElement.classList.add('fade-out');
                setTimeout(() => alertElement.remove(), 500);
            });

            // Attach mark-as-read behavior
            alertElement.querySelector('.mark-read-btn').addEventListener('click', () => {
                const notificationId = notification.id;

                fetch('/notifications/mark-read', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: notificationId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alertElement.classList.add('fade-out');
                            setTimeout(() => alertElement.remove(), 500);
                        } else {
                            console.warn('Failed to mark as read');
                        }
                    })
                    .catch(err => {
                        console.error('Error marking as read:', err);
                    });
            });

            container.appendChild(alertElement);
        }
    </script>
</body>


</html>
