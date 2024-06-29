<!DOCTYPE html>
<html lang="es">
@include('web.partials.head')

<body class="bg-secondary min-vh-100">
    @include('web.partials.nav')
    <main class="">
        @hasSection('custom_title')
            @yield('custom_title')
        @else
            @yield('breadcrumb')
            <h1 class="text-center my-5">@yield('title')</h1>
        @endif
        @yield('content')
    </main>
    @include('web.partials.footer')
</body>

</html>
