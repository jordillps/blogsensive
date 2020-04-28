
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {{-- setActiveRoute es un helper App/http/helpers.php  --}}
        <li class="nav-item">
            <a href="{{ route('admin')}}" class="nav-link {{ setActiveRoute('admin')}}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    @lang('global.dashboard')
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-open {{ setActiveRoute('admin.posts.index')}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    @lang('global.blog')
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    {{-- <a href="{{route('admin.posts.index')}}" {{ request()->is('/admin/posts') ? 'class=nav-link active': 'class=nav-link'}} > --}}
                        <a href="{{route('admin.posts.index')}}" class="nav-link {{ setActiveRoute('admin.posts.index')}}" >
                        <i class="far fa-eye"></i>
                        <p>@lang('global.allposts')</p>
                    </a>
                </li>
                <li class="nav-item" data-toggle="modal" data-target="#exampleModal">
                    @if(Request::is('admin/posts/*'))
                        <a href="{{ route('admin.posts.index', '#create')}}" class="nav-link">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>@lang('global.createpost')</p>
                        </a>
                    @else
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>@lang('global.createpost')</p>
                        </a>
                    @endif
                </li>
            </ul>
        </li>
        @can('view', new App\User)
            <li class="nav-item has-treeview menu-open {{ setActiveRoute('admin.users.index')}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        @lang('global.users')
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{route('admin.users.index')}}" class="nav-link {{ setActiveRoute('admin.users.index')}}" >
                            <i class="far fa-eye"></i>
                            <p>@lang('global.usersall')</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.create')}}" class="nav-link {{ setActiveRoute('admin.users.create')}}">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>@lang('global.createuser')</p>
                        </a>
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-item has-treeview menu-open {{ setActiveRoute('admin.users.show')}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        @lang('global.profile')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{route('admin.users.show', auth()->user())}}" class="nav-link {{ setActiveRoute('admin.users.show')}}" >
                            <i class="far fa-eye"></i>
                            <p>@lang('global.myprofile')</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @if (auth()->user()->hasRole('Admin'))
            <li class="nav-item has-treeview menu-open {{ setActiveRoute('admin.roles.index')}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                        @lang('global.roles')
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{route('admin.roles.index')}}" class="nav-link {{ setActiveRoute('admin.roles.index')}}" >
                            <i class="far fa-eye"></i>
                            <p>@lang('global.rolesall')</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles.create')}}" class="nav-link {{ setActiveRoute('admin.roles.create')}}">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>@lang('global.createrole')</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (auth()->user()->hasRole('Admin'))
            <li class="nav-item has-treeview menu-open {{ setActiveRoute('admin.permissions.index')}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        @lang('global.permissions')
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{route('admin.permissions.index')}}" class="nav-link {{ setActiveRoute('admin.permissions.index')}}" >
                            <i class="far fa-eye"></i>
                            <p>@lang('global.permissionsall')</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

    </ul>
  </nav>
