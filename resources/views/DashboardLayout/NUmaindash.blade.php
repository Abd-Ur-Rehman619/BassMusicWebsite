@include('DashboardLayout.head')
@include('DashboardLayout.header')
@include('DashboardLayout.NUsidebar')
{{-- @yield('Creator.sidebar') --}}
@yield('main.dashboard')
@include('DashboardLayout.footer')
@yield('js-section')
