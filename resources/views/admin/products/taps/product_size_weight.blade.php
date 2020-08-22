
@push('js')
    <script>
        $(document).ready(function(){

            var dataSelect = [
                @foreach($countries as $country)

                    {
                        "text" : "{{$country->name}}",
                        "children" : [
                            @if(count($country->malls) > 0 )
                                @foreach($country->malls as $mall)
                                {
                                    "id" : "{{$mall->id}}",
                                    "text" : "{{$mall->name}}",
                                    @if(count($product->malls->where('id',$mall->id))>0)
                                        "selected" :'true'
                                    @endif
                                },
                                @endforeach
                            @endif
                        ],
                    },

                @endforeach

            ];

            $('.select2').select2({data:dataSelect});
        });
    </script>
@endpush

<div class="tab-pane container fade" id="product_size_weight">


    <div class="size_weight">
        <h1>@lang('admin.choose_category')</h1>
    </div>
  
    <div class="d-flex justify-content-between">
        <div class="col form-group">
            <label>@lang('admin.countries')</label>
            <select name="malls[]" class="form-control select2" multiple="multiple" style="width: 100%">
                {{-- @foreach($countries as $country)
                    <optgroup label="{{$country->name}}" data-select2-id="select2-data-{{$country->id}}">
                        @if(count($country->malls) > 0 )
                            @foreach($country->malls as $mall)
                                <option value="{{$mall->id}}" data-select2-id="select2-data-{{$mall->id}}">{{$mall->name}}</option>
                            @endforeach
                        @endif
                    </optgroup>
                 @endforeach --}}
            </select>
    
        </div>
        <div class="col form-group">
            <label>@lang('admin.colors')</label>
            <select name="color_id" id="color_id" class="form-control">
                <option>@lang('admin.choose')</option>
                 @foreach($colors as $color)
                    <option @if($product->color_id == $color->id) selected @endif value="{{$color->id}}">{{$color->name}}</option>
                 @endforeach
            </select>
    
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="col form-group">
            <label>@lang('admin.tradmarks')</label>
            <select name="tradmark_id" id="tradmark_id" class="form-control">
                <option>@lang('admin.choose')</option>
                 @foreach($tradmarks as $tradmark)
                    <option @if($product->tradmark_id == $tradmark->id) selected @endif value="{{$tradmark->id}}">{{$tradmark->name}}</option>
                 @endforeach
            </select>
    
        </div>
        <div class="col form-group">
            <label>@lang('admin.manufacthrers')</label>
            <select name="manufacthrer_id" id="manufacthrer_id" class="form-control">
                <option>@lang('admin.choose')</option>
                 @foreach($manufacthrers as $manufacthrer)
                    <option @if($product->manufacthrer_id == $manufacthrer->id) selected @endif value="{{$manufacthrer->id}}">{{$manufacthrer->name}}</option>
                 @endforeach
            </select>
    
        </div>
    </div>

</div>