
@include('admin.layouts._header')

@include('admin.layouts._nav')
 @include('admin.layouts._sidebar')

  {{-- Content Wrapper. Contains page content --}}
  <div class="content-wrapper">
    {{-- Content Header (Page header) --}}
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        @yield('header')

        </div>{{-- /.row --}}
      </div>{{-- /.container-fluid --}}
    </div>
    {{-- /.content-header --}}

    {{-- Main content --}}
    <div class="content">
      @include('admin.layouts._messages')

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{--  @include('admin.layouts._errors')  --}}
                    @yield('content')
                </div>


            </div>
            {{-- /.row --}}
        </div>{{-- /.container-fluid --}}
    </div>
    {{-- /.content --}}
  </div>
  {{-- /.content-wrapper --}}

  {{-- Control Sidebar --}}
  <aside class="control-sidebar control-sidebar-dark">
      {{-- Control sidebar content goes here --}}
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    {{-- /.control-sidebar --}}

  @include('admin.layouts._footer')
