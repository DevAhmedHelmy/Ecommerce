<div class="d-flex justify-content-between">
    <div class="col form-group">
        <label>@lang('admin.size')</label>
        <input type="text" name="size" id="size" class="form-control">
    </div>
    <div class="col form-group">
        <label>@lang('admin.sizes')</label>
        <select name="size_d" id="size_d" class="form-control">
            <option>@lang('admin.choose')</option>
             @foreach($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
             @endforeach
        </select>

    </div>
     
</div>
<div class="d-flex justify-content-between">
    <div class="col form-group">
        <label>@lang('admin.weight')</label>
        <input type="text" name="weight" id="weight" class="form-control">
    </div>
    <div class="col form-group">
        <label>@lang('admin.weights')</label>
        <select name="weight_d" id="weight_d" class="form-control">
            <option>@lang('admin.choose')</option>
             @foreach($weights as $weight)
                <option value="{{$weight->id}}">{{$weight->name}}</option>
             @endforeach
        </select>

    </div>
</div>