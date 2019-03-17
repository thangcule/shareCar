<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Homepage</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="{{asset('common/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('common/bootstrap/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/blablacar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('link')
    @yield('style')
    <script src="{{asset('common/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('common/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('common/bootstrap/js/moment.js')}}"></script>
    <script src="{{asset('common/bootstrap/js/bootstrap-datetimepicker.min.js')}}"></script>
 
</head>
<body>
    <div class="Layout">
        <div class="Layout-header">
            @include('includes.header')
        </div>
        <main id="main-container" class="Layout-main " role="main" style="margin-top: -55px;">
            @yield('content')
        </main>
        
        @include('includes.footer')
    </div>
    @yield('script')
</body>
</html>