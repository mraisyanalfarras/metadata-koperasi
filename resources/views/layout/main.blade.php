<!DOCTYPE html>
<html lang="en">

<head>

    <title>@yield('title') | Web Desa Bukit Agung</title>

    @include('includes.frontsite.meta')

    @include('includes.frontsite.style')

    @stack('style')


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
        @include('components.frontsite.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('components.frontsite.navbar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
        @yield('konten')
    <!-- Carousel End -->


    <!-- Footer Start -->
        @include('components.frontsite.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    @include('includes.frontsite.script')

    @stack('script')


    <!-- Template Javascript -->
    <script src="{{ asset('assets/frontsite/js/main.js') }}"></script>
</body>

</html>
