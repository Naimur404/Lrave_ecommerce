@include('partial.head')

<body>

@include('admin.partaial.message')
@yield('content')
@include('partial.footer')

    @include('partial.scripts')
    @yield('scripts')
</body>


