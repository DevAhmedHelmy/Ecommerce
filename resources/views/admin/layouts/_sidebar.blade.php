{{-- Main Sidebar Container --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- Brand Logo --}}
        <a href="#" class="brand-link">
            <img src="{{ asset('adminPanal/uploads/logos/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">{{ (app()->getLocale() == 'ar') ? setting()->sitename_ar : setting()->sitename_en }}</span>
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
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{trans('admin.dashboard')}}

                            </p>
                        </a>
                    </li>
                    @can('roles-list')
                        <li class="nav-item">
                            <a href="{{route('admin.roles.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-hand-sparkles"></i>
                                <p>
                                    {{trans('admin.permissions')}}

                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('settings-list')
                        <li class="nav-item">
                            <a href="{{adminUrl('settings')}}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
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
                    @can('categories-list')
                        <li class="nav-item has-treeview {{active_menu('categories')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    {{trans('admin.categories')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('categories')[1]}}">
                                <li class="nav-item {{active_menu('categories')[2]}}">
                                    <a href="{{adminUrl('categories')}}" class="nav-link">
                                        <i class="fa fa-list-alt nav-icon"></i>
                                        <p>{{trans('admin.categories')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('tradmarks-list')
                        <li class="nav-item has-treeview {{active_menu('tradmarks')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-trademark"></i>
                                <p>
                                    {{trans('admin.tradmarks')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('tradmarks')[1]}}">
                                <li class="nav-item {{active_menu('tradmarks')[2]}}">
                                    <a href="{{adminUrl('tradmarks')}}" class="nav-link">
                                        <i class="fa fa-trademark nav-icon"></i>
                                        <p>{{trans('admin.tradmarks')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('manufacthrers-list')
                        <li class="nav-item has-treeview {{active_menu('manufacthrers')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-industry"></i>
                                <p>
                                    {{trans('admin.manufacthrers')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('manufacthrers')[1]}}">
                                <li class="nav-item {{active_menu('manufacthrers')[2]}}">
                                    <a href="{{adminUrl('manufacthrers')}}" class="nav-link">
                                        <i class="fa fa-industry nav-icon"></i>
                                        <p>{{trans('admin.manufacthrers')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('shippings-list')
                        <li class="nav-item has-treeview {{active_menu('shippings')[0]}}">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                                <p>
                                    {{trans('admin.shippings')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('shippings')[1]}}">
                            <li class="nav-item {{active_menu('shippings')[2]}}">
                                <a href="{{adminUrl('shippings')}}" class="nav-link">
                                    <i class="fa fa-shopping-cart nav-icon"></i>
                                    <p>{{trans('admin.shippings')}}</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                    @endcan
                    @can('malls-list')
                        <li class="nav-item has-treeview {{active_menu('malls')[0]}}">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-basket"></i>
                                <p>
                                    {{trans('admin.malls')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('malls')[1]}}">
                            <li class="nav-item {{active_menu('malls')[2]}}">
                                <a href="{{adminUrl('malls')}}" class="nav-link">
                                    <i class="fa fa-shopping-basket nav-icon"></i>
                                    <p>{{trans('admin.malls')}}</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                    @endcan
                    @can('colors-list')
                        <li class="nav-item has-treeview {{active_menu('colors')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-palette"></i>
                                <p>
                                    {{trans('admin.colors')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('colors')[1]}}">
                                <li class="nav-item {{active_menu('colors')[2]}}">
                                    <a href="{{adminUrl('colors')}}" class="nav-link">
                                        <i class="fas fa-palette nav-icon"></i>
                                        <p>{{trans('admin.colors')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('sizes-list')
                        <li class="nav-item has-treeview {{active_menu('sizes')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-business-time"></i>
                                <p>
                                    {{trans('admin.sizes')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('sizes')[1]}}">
                            <li class="nav-item {{active_menu('sizes')[2]}}">
                                <a href="{{adminUrl('sizes')}}" class="nav-link">
                                    <i class="nav-icon fas fa-business-time"></i>
                                    <p>{{trans('admin.sizes')}}</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                    @endcan
                    @can('weights-list')
                        <li class="nav-item has-treeview {{active_menu('weights')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>
                                    {{trans('admin.weights')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('weights')[1]}}">
                                <li class="nav-item {{active_menu('weights')[2]}}">
                                    <a href="{{adminUrl('weights')}}" class="nav-link">
                                        <i class="fas fa-balance-scale nav-icon"></i>
                                        <p>{{trans('admin.weights')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('products-list')
                        <li class="nav-item has-treeview {{active_menu('products')[0]}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    {{trans('admin.products')}}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{active_menu('products')[1]}}">
                                <li class="nav-item {{active_menu('products')[2]}}">
                                    <a href="{{adminUrl('products')}}" class="nav-link">
                                        <i class="fab fa-product-hunt nav-icon"></i>
                                        <p>{{trans('admin.products')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{adminUrl('logout')}}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
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
