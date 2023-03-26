@include('layouts.header')
<!-- Page Header Start-->
@include('layouts.navbar')
<!-- Page Header Ends-->
<!-- Page Body Start-->

<!-- Page Sidebar Start-->

<!-- Page Sidebar Ends-->

<!-- Right sidebar Start-->
@include('layouts.rightsidebar')
<!-- Right sidebar Ends-->
<div class="page-body">
    @yield('content')
    <!-- footer start-->
    @include('layouts.footer')
    <!-- latest jquery-->