<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.backsite.meta')

    <title>@yield('title') | Halaman Admin</title>

    @include('includes.backsite.style')

    @stack('style')

</head>

<body>
    <div class="wrapper">

        @include('components.backsite.sidebar')

        <div class="main">

            @include('components.backsite.navbar')

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('content')

                </div>
            </main>


            @include('components.backsite.footer')
        </div>
    </div>

    @include('includes.backsite.script')

    @stack('script')

    @stack('scripts')

    
</body>

</html>
