    @include('admin.layouts._header')
 
<!-- [ navigation menu ] start -->
    @include('admin.layouts._sidebar')
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
    @include('admin.layouts._nav')
<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                    @yield('header')
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            @yield('content')
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@include('admin.layouts._footer')
