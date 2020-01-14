
@include('admin.layouts._header')

@include('admin.layouts._nav')
 @include('admin.layouts._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        @yield('header')
           
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @include('admin.layouts._messages')

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
              @include('admin.layouts._errors')

                    @yield('content')
                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts._aside')

  @include('admin.layouts._footer')
