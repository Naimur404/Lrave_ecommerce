@include('partial.head')

<body>
    @include('admin.partaial.message')

    <div class="wrapper">

@yield('content')
@include('partial.footer')
    </div>
    @include('partial.scripts')
    @yield('scripts')
</body>


