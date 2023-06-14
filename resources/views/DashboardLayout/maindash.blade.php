<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('Dashboard-assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Dashboard-assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <title> DASHBOARD </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('FrontEnd-Assets/img/core-img/logo.jpg') }}">
    @yield('css-section')
</head>

<body>
    @include('DashboardLayout.header')
    @include('DashboardLayout.sidebar')

    @yield('main.dashboard')
    @include('DashboardLayout.footer')
    @yield('js-section')
