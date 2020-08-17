{{-- Main Footer --}}
<footer class="main-footer">
    {{-- To the right --}}
    <div class="float-right d-none d-sm-inline">

    </div>
    {{-- Default to the left --}}
    <strong>Copyright &copy; 2018-2020 <a href="#"> Ahmed Helmy</a>.</strong> All rights reserved.
  </footer>
</div>
{{-- ./wrapper --}}

{{-- REQUIRED SCRIPTS --}}

{{-- jQuery --}}

<script src="{{asset('adminPanal/js/jquery.min.js')}}"></script>
{{-- Bootstrap 4 --}}

<script src="{{asset('adminPanal/js/bootstrap.bundle.min.js')}}"></script>
{{-- AdminLTE App --}}
<script src="{{asset('adminPanal/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminPanal/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('adminPanal/js/dataTables.buttons.js')}}"></script>


<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="{{asset('adminPanal/js/adminlte.min.js')}}"></script>
<script src="{{asset('adminPanal/js/custom.js')}}"></script>
<script src="{{asset('adminPanal/js/sweetalert.min.js')}}"></script>

<script src="{{ asset('adminPanal/jstree/jstree.js') }}"></script>
<script src="{{ asset('adminPanal/jstree/jstree.checkbox.js') }}"></script>
<script src="{{asset('adminPanal/js/select2.min.js')}}"></script>
<script src="{{asset('adminPanal/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('adminPanal/js/bootstrap-datepicker.ar.min.js')}}"></script>

<script>
    function confirmDelete(item_id) {


        swal({
            title: "{{ __('general.Are_you_sure') }}",
            text: "{{ __('general.Once_deleted') }}",
            icon: "warning",
            buttons: ["{{ __('general.no') }}", "{{ __('general.Delete') }}"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    console.log(item_id);
                    $('#'+item_id).submit();
                } else {
                    swal("{{ __('general.Cancelled_Successfully') }}");
                }
            });
    }


    $(document).ready(function() {
        $('.select2').select2();
    });
  </script>
@stack('js')
@stack('css')
</body>
</html>
