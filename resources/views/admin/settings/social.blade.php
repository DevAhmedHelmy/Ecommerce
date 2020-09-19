@push('js')
    <script>
        var x = 1;
        $(document).on('click','.add_input',function(){
            var max_input = 9;

            var content = `<div class="d-flex justify-content-between">
                    <div class="col form-group">
                        <label>@lang('admin.name')</label>
                        <input type="text" name="additionals_name[]" class="form-control">
                    </div>
                    <div class="col form-group">
                        <label>@lang('admin.value')</label>
                        <input type="text" name="additionals_value[]" class="form-control">
                    </div>
                    <button type="button" class="btn btn-danger remove_input"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                </div>`;
            if(x < max_input)
            {

                $('.additional_input').append(content);
                x++;
            }
        });

        $(document).on('click','.remove_input',function(){
            $(this).parent('div').remove();
            x--;
        });
    </script>
@endpush

<div>
    <div>
        <h2>@lang('admin.additional_data')</h2>
    </div>
    <div class="additional_input">
        @if(social() !== null)
            @foreach($social as $value)

                {{-- <div class="d-flex justify-content-between">
                    <div class="col form-group">
                        <label>@lang('admin.name')</label>
                        <input type="text" name="social_media[]" class="form-control" value="{{$value->name}}">
                    </div>
                    <div class="col form-group">
                        <label>@lang('admin.value')</label>
                        <input type="text" name="social_media[]" class="form-control" value="{{$value->value}}">
                    </div>
                    <button type="button" class="btn btn-danger remove_input"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                </div> --}}
            @endforeach
        @endif
    </div>

    <button type="button" class="btn btn-info add_input"><i class="fa fa-plus"></i> @lang('admin.add')</button>
</div>
