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

<script src="{{asset('adminPanel/js/jquery.min.js')}}"></script>
{{-- Bootstrap 4 --}}

<script src="{{asset('adminPanel/js/bootstrap.bundle.min.js')}}"></script>
{{-- AdminLTE App --}}
<script src="{{asset('adminPanel/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminPanel/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('adminPanel/js/dataTables.buttons.js')}}"></script>


<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="{{asset('adminPanel/js/adminlte.min.js')}}"></script>
<script src="{{asset('adminPanel/js/custom.js')}}"></script>
<script src="{{asset('adminPanel/js/sweetalert.min.js')}}"></script>

<script src="{{ asset('adminPanel/jstree/jstree.js') }}"></script>
<script src="{{ asset('adminPanel/jstree/jstree.checkbox.js') }}"></script>
<script src="{{asset('adminPanel/js/select2.min.js')}}"></script>
<script src="{{asset('adminPanel/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('adminPanel/js/bootstrap-datepicker.ar.min.js')}}"></script>
<script src="{{asset('adminPanel/js/dropify.min.js')}}"></script>
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
        $('.dropify').dropify({
            messages: {
                default: '{{ trans('admin.upload_iamage') }}',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  '{{ trans('admin.delete') }}',
                error:   'Désolé, le fichier trop volumineux'
            }
        });


    });
  </script>
@stack('js')
@stack('css')
</body>
</html>
