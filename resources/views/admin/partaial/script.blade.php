<script src="{{ asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('asset/js/shared/off-canvas.js')}}"></script>
<script src="{{ asset('asset/js/shared/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('asset/js/shared/jquery.cookie.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>
