 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('adminPanal/uploads/logos/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminPanal/uploads/users/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>

        <div class="info">
            @if(\Auth::check())
          <a href="#" class="d-block">{{admin()->user()->name}}</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

			<li class="nav-item">
				<a href="{{adminUrl('')}}" class="nav-link">
				<i class="nav-icon fa fa-dashboard"></i>
				<p>
					{{trans('admin.dashboard')}}

				</p>
				</a>
			</li>
            <li class="nav-item">
				<a href="{{adminUrl('settings')}}" class="nav-link">
				<i class="nav-icon fa fa-dashboard"></i>
				<p>
					{{trans('admin.settings')}}

				</p>
				</a>
			</li>
          <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                {{trans('admin.admins')}}
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview {{active_menu('admin')[1]}}">
              <li class="nav-item {{active_menu('admin')[2]}}">
                <a href="{{adminUrl('admin')}}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>{{trans('admin.adminAcounts')}}</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview {{active_menu('user')[0]}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                {{trans('admin.users')}}
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview {{active_menu('user')[1]}}">
              <li class="nav-item {{active_menu('admin')[2]}}">
                <a href="{{adminUrl('user')}}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>{{trans('admin.users_acounts')}}</p>
                </a>
              </li>

              <li class="nav-item {{active_menu('admin')[2]}}">
                <a href="{{adminUrl('user')}}?level=user" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>{{trans('admin.user')}}</p>
                </a>
              </li>

              <li class="nav-item {{active_menu('admin')[2]}}">
                <a href="{{adminUrl('user')}}?level=vendor" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>{{trans('admin.vendor')}}</p>
                </a>
              </li>

              <li class="nav-item {{active_menu('admin')[2]}}">
                <a href="{{adminUrl('user')}}?level=company" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>{{trans('admin.company')}}</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{adminUrl('logout')}}" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>

                {{ trans('admin.logout') }}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
