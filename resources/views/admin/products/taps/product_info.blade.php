<div class="tab-pane container active" id="product_info">
    <div class="d-flex justify-content-between">
        {{--  input name  --}}
        @foreach (config('translatable.locales') as $locale)
            <div class="col form-group">
                @if(count(config('translatable.locales'))>1)
                    <label>@lang('admin.' . $locale . '.title')</label>
                @else
                    <label>@lang('admin.title')</label>
                @endif
                <input type="text" name="{{ $locale.'[title]' }}" id="{{ $locale . '[title]' }}" placeholder="@lang('admin.title')" class="form-control @error("{{ $locale . '.title' }}" ) is-invalid @enderror">
            </div>
            @error("{{ $locale . '.title' ['requried'] }} ")
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
