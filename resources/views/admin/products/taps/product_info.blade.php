<div class="tab-pane container active" id="product_info">
    <div class="d-flex justify-content-between">
        {{--  input name  --}}
        @foreach (config('translatable.locales') as $locale)
            <div class="col form-group">
                @if(count(config('translatable.locales'))>1)
                    <label>@lang('admin.' . $locale . '.name')</label>
                @else
                    <label>@lang('admin.name')</label>
                @endif
                <input type="text" name="{{ $locale.'[name]' }}" id="{{ $locale . '[name]' }}" placeholder="@lang('admin.name')" class="form-control @error("{{ $locale . '.name' }}" ) is-invalid @enderror">
            </div>
            @error("{{ $locale . '.name' ['requried'] }} ")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @endforeach

    </div>
    <div class="d-flex justify-content-between">
        {{--  input name  --}}
        @foreach (config('translatable.locales') as $locale)
            <div class="col form-group">
                @if(count(config('translatable.locales'))>1)
                    <label>@lang('admin.' . $locale . '.content')</label>
                @else
                    <label>@lang('admin.content')</label>
                @endif

                <textarea name="{{ $locale.'[content]' }}" id="{{ $locale.'[content]' }}" placeholder="@lang('admin.' . $locale . '.content')" class="form-control" cols="30" rows="10"></textarea>
            </div>
            @error("{{ $locale . '.content' ['requried'] }} ")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @endforeach

    </div>

</div>
