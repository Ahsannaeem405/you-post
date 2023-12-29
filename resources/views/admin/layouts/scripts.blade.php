    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('assets/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/extensions/shepherd.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('assets/js/core/app.js')}}"></script>
    <script src="{{asset('assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->
    <script src="{{asset('assets/js/scripts/cards/card-statistics.js')}}"></script>
    <script src="{{asset('assets/js/scripts/datatables/datatable.js')}}"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{asset('assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script src="{{asset('assets/js/scripts/cards/card-analytics.js')}}"></script>
    <!-- END: Page JS-->
    <script src="{{asset('assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/ui/data-list-view.js')}}"></script>

    {{-- User Table --}}
    <script src="{{asset('assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js')}}"></script>
    <script src="{{asset('assets/js/scripts/pages/app-user.js')}}"></script>
    {{-- User Table End--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- sweet alert -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>


<!-- quill editor script -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.quilljs.com/1.2.6/quill.min.js"></script>


<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    theme: 'snow',

  });
// var quill = new Quill('#editor', {
//   modules: {
//     toolbar: '#toolbar'
//   },
//   theme: 'snow'
// });
</script>
<!-- new script for dashboard -->

  <!-- jQuery -->
    <!-- Bootstrap -->

    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>

    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>

    <!-- Chart.js -->
    <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>

    <!-- gauge.js -->
    <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>

    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>

    <!-- Skycons -->
    <script src="{{asset('vendors/skycons/skycons.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>

    <script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>

    <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>

        <script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>

    <script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>

    <!-- Flot plugins -->
    <script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>

    <script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>

    <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>

    <!-- DateJS -->
    <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>

    <!-- JQVMap -->
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>

    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>

    <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>

    <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>


    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script>


                $(document).on('click','.delete-item', function (event) {
                    event.preventDefault();

                    // Get the delete URL from data-url attribute
                    var deleteUrl = $(this).data('url');

                    // Confirm deletion with SweetAlert
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            // If confirmed, make an AJAX request to delete the user
                            $.ajax({
                                url: deleteUrl,
                                type: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (data) {
                                    // Handle success, e.g., show success message
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'User has been deleted.',
                                        icon: 'success'
                                    }).then(function () {
                                        // Optionally, you can reload the page or update the UI
                                        location.reload();
                                    });
                                },
                                error: function (xhr, status, error) {
                                    // Handle error, e.g., show error message
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Unable to delete user.',
                                        icon: 'error'
                                    });
                                }
                            });
                        }
                    });
                });

            </script>


