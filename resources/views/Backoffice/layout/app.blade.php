<!DOCTYPE html>
<html lang="es">
@include('backoffice.partials.head')

<body class="bg-secondary min-vh-100">
    @include('backoffice.partials.nav')
    <main class="">
            @yield('breadcrumb')
            <h1 class="text-center my-5">@yield('title')</h1>
        @yield('content')
    </main>
    @include('backoffice.partials.footer')
</body>

</html>