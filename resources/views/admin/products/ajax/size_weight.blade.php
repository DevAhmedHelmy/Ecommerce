<div class="d-flex justify-content-between">
    <div class="col form-group">
        <label>@lang('admin.size')</label>
        <input type="text" name="size" id="size" class="form-control" value="{{$product->size}}">
    </div>
    <div class="col form-group">
        <label>@lang('admin.sizes')</label>
        <select name="size_id" id="size_id" class="form-control">
            <option>@lang('admin.choose')</option>
             @foreach($sizes as $key => $size)
                <option @if($product->size_id == $key) selected @endif value="{{$key}}">{{$size}}</option>
             @endforeach
        </select>

    </div>
     
</div>
<div class="d-flex justify-content-between">
    <div class="col form-group">
        <label>@lang('admin.weight')</label>
        <input type="text" name="weight" id="weight" class="form-control" value="{{$product->weight}}">
    </div>
    <div class="col form-group">
        <label>@lang('admin.weights')</label>
        <select name="weight_id" id="weight_id" class="form-control">
            <option>@lang('admin.choose')</option>
             @foreach($weights as $key => $weight)
                <option @if($product->weight_id == $key) selected @endif value="{{$key}}">{{$weight}}</option>
             @endforeach
        </select>

    </div>
</div>