
@push('js')
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            rtl: "{{app()->getLocale() == 'ar' ? true : false}}",
            language:"{{app()->getLocale()}}",
            autoclose:false,
            todayBtn:true,
            clearBtn:true
        });
    </script>
@endpush
<div class="tab-pane container fade" id="product_setting">
    <div class="d-flex justify-content-between">
        <div class="col form-group">
            <label>@lang('admin.price')</label>
            <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
        </div>
        <div class="col form-group">
            <label>@lang('admin.stock')</label>
            <input type="text" name="stock" id="stock" class="form-control" value="{{$product->stock}}">
        </div>
        <div class="col form-group">
            <label>@lang('admin.status')</label>
            <select name="status" id="status" class="form-control">
                <option>@lang('admin.choose')</option>
                <option @if($product->status == 'pending') selected @endif value="pending">@lang('admin.pending')</option>
                <option @if($product->status == 'active') selected @endif value="active">@lang('admin.active')</option>
                <option @if($product->status == 'refused') selected @endif value="refused">@lang('admin.refused')</option>
            </select>

        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="col form-group">
            <label>@lang('admin.start_at')</label>
            <input type="text" name="start_at" id="start_at" class="form-control datepicker" value="{{$product->start_at}}" >
        </div>
        <div class="col form-group">
            <label>@lang('admin.end_at')</label>
            <input type="text" name="end_at" id="end_at" class="form-control datepicker" value="{{$product->end_at}}">
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="col form-group">
            <label>@lang('admin.offer_price')</label>
            <input type="text" name="offer_price" id="offer_price" class="form-control" value="{{$product->offer_price}}">
        </div>
        <div class="col form-group">
            <label>@lang('admin.start_offer_at')</label>
            <input type="text" name="start_offer_at" id="start_offer_at" class="form-control datepicker" value="{{$product->start_offer_at}}">
        </div>
        <div class="col form-group">
            <label>@lang('admin.end_offer_at')</label>
            <input type="text" name="end_offer_at" id="end_offer_at" class="form-control datepicker" value="{{$product->end_offer_at}}">
        </div>

    </div>
    <div class="d-flex justify-content-between">
        <div class="col form-group">
            <label>@lang('admin.refuse_reason')</label>
            <textarea name="refuse_reason" class="form-control" id="" cols="30" rows="10">{{$product->refuse_reason}}</textarea>
        </div>
    </div>
</div>
