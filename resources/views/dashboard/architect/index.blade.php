@extends('dashboard.index-main')
@section('title', 'Dashboard | Stone Bazaar')
@section('css-content')

@endsection
@section('content')

@endsection
@section('js-content')
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
            $('#dashboard').addClass('pcoded-trigger');
            $('#dashboard-default').addClass('active');
        });
    </script>
@endsection
