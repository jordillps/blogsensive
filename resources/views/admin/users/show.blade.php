@extends('admin.layout')


@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if($user->avatar == 'avatar-icon.png')
                                        <img class="profile-user-img img-fluid img-circle" src="/img/avatars/avatar-icon.png" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle" src="/storage/avatars/{{ $user->avatar }}" alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}</h3>

                                <p class="text-muted text-center">{{$user->getRolesDisplayNames()->implode(', ')}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>@lang('global.email')</b> <a class="float-right">{{$user->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>@lang('global.posts')</b> <a class="float-right">{{$user->posts->count()}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        @if($user->roles->count() > 0)
                                            <b>@lang('global.roles')</b> <a class="float-right">{{$user->getRolesDisplayNames()->implode(', ')}}</a>
                                        @endif
                                    </li>
                                </ul>

                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary btn-block"><b>@lang('global.edit')</b></a>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- Roles Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">@lang('global.roles')</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @forelse($user->roles as $role)
                                        <p><strong>{{$role->display_name}}</strong></p>

                                        @if($role->permissions->count())
                                           <p>{{$role->permissions->pluck('name')->implode(', ')}}</p>
                                        @endif

                                        @unless($loop->last)
                                            <hr>
                                        @endunless
                                    @empty
                                        <p>@lang('global.noroles')</p>
                                    @endforelse
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- Permissions Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">@lang('global.permissions')</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @forelse($user->permissions as $permission)
                                        <p><strong>{{$permission->name}}</strong></p>
                                        @unless($loop->last)
                                            <hr>
                                        @endunless
                                    @empty
                                        <p>@lang('global.nopermissions')</p>
                                    @endforelse
                            </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    {{-- <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul> --}}
                                    <h3 class="card-title">@lang('global.posts')</h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    @forelse($user->posts->sortByDesc('published_at') as $post)
                                        <strong><a href="{{ route('admin.posts.edit', $post)}}">
                                            {{$post->title}}
                                        </a></strong>
                                        <p>@lang('global.publish'): {{$post->published_at->format('d/m/Y')}}</p>
                                        <p>{{$post->excerpt}}</p>
                                        <p>@lang('global.comments'): {{$post->comments->count()}}</p>
                                        @unless($loop->last)
                                            <hr>
                                        @endunless
                                    @empty
                                        <p>@lang('global.noposts')</p>
                                    @endforelse
                                </div>
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

@endsection
