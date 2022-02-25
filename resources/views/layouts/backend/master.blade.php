@include('admin.partaial.head')

<body>
    <div class="wrapper">

        <div class="container-scroller">

@include('admin.partaial.navbar')
<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
@include('admin.partaial.sidenavbar')

    <div class="main-panel">
        @yield('content')
      <div class="content-wrapper"> </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->

      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>




@include('admin.partaial.footer')\

        </div>
</div>

</body>
@include('admin.partaial.script')
