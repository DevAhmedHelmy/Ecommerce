 {{-- Main Sidebar Container --}}
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- Brand Logo --}}
    <a href="#" class="brand-link">
      <img src="{{ asset('adminPanal/uploads/logos/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Commerce</span>
    </a>

    {{-- Sidebar --}}
    <div class="sidebar">
      {{-- Sidebar user panel (optional) --}}
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

      {{-- Sidebar Menu --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --}}

			<li class="nav-item">
				<a href="{{adminUrl('')}}" class="nav-link">
				<i class="nav-icon fa fa-dashboard"></i>
				<p>
					{{trans('admin.dashboard')}}

				</p>
				</a>
            </li>
            @can('role-list')
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        {{trans('admin.roles')}}

                    </p>
                    </a>
                </li>
            @endcan
            @can('settings-list')
                <li class="nav-item">
                    <a href="{{adminUrl('settings')}}" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        {{trans('admin.settings')}}
                    </p>
                    </a>
                </li>
            @endcan
            @can('admins-list')
                <li class="nav-item has-treeview {{active_menu('admins')[0]}}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        {{trans('admin.admins')}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('admins')[1]}}">
                    <li class="nav-item {{active_menu('admin')[2]}}">
                        <a href="{{adminUrl('admins')}}" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{trans('admin.adminAcounts')}}</p>
                        </a>
                    </li>

                    </ul>
                </li>
            @endcan
            @can('all-users-list')
                <li class="nav-item has-treeview {{active_menu('users')[0]}}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        {{trans('admin.users')}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('users')[1]}}">
                    @can('all-users-list')
                        <li class="nav-item {{active_menu('admin')[2]}}">
                            <a href="{{adminUrl('users')}}" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>{{trans('admin.users_acounts')}}</p>
                            </a>
                        </li>
                    @endcan
                    @can('users-list')
                    <li class="nav-item {{active_menu('user')[2]}}">
                        <a href="{{adminUrl('users')}}?level=user" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{trans('admin.user')}}</p>
                        </a>
                    </li>
                    @endcan
                    @can('vendor-users-list')
                        <li class="nav-item {{active_menu('users')[2]}}">
                            <a href="{{adminUrl('users')}}?level=vendor" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>{{trans('admin.vendor')}}</p>
                            </a>
                        </li>

                    @endcan
                    @can('company-users-list')
                        <li class="nav-item {{active_menu('user')[2]}}">
                            <a href="{{adminUrl('users')}}?level=company" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>{{trans('admin.company')}}</p>
                            </a>
                        </li>

                    @endcan
                    </ul>
                </li>
            @endcan
            @can('countries-list')
                <li class="nav-item has-treeview {{active_menu('countries')[0]}}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-flag"></i>
                    <p>
                        {{trans('admin.countries')}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('countries')[1]}}">
                    <li class="nav-item {{active_menu('countries')[2]}}">
                        <a href="{{adminUrl('countries')}}" class="nav-link">
                        <i class="fa fa-flag nav-icon"></i>
                        <p>{{trans('admin.countries')}}</p>
                        </a>
                    </li>
                    </ul>
                </li>
            @endcan
            @can('cities-list')
                <li class="nav-item has-treeview {{active_menu('cities')[0]}}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-flag"></i>
                    <p>
                        {{trans('admin.cities')}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('cities')[1]}}">
                    <li class="nav-item {{active_menu('cities')[2]}}">
                        <a href="{{adminUrl('cities')}}" class="nav-link">
                        <i class="fa fa-flag nav-icon"></i>
                        <p>{{trans('admin.cities')}}</p>
                        </a>
                    </li>
                    </ul>
                </li>
            @endcan
<<<<<<< HEAD
=======
            @can('states-list')
                <li class="nav-item has-treeview {{active_menu('states')[0]}}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-flag"></i>
                    <p>
                        {{trans('admin.states')}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview {{active_menu('states')[1]}}">
                    <li class="nav-item {{active_menu('states')[2]}}">
                        <a href="{{adminUrl('states')}}" class="nav-link">
                        <i class="fa fa-flag nav-icon"></i>
                        <p>{{trans('admin.states')}}</p>
                        </a>
                    </li>
                    </ul>
                </li>
            @endcan
>>>>>>> 3e31dfae0ff4a4ea6dae2dcf7cf2bccd078d05ce

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
      {{-- /.sidebar-menu --}}
    </div>
    {{-- /.sidebar --}}
  </aside>
