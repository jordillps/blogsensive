@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(session()->has('flash'))
                <div class="alert alert-success">{{session('flash')}}</div>
            @endif
            <div class="row">
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            {{-- <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul> --}}
                            <h3 class="card-title">@lang('global.personaldata')</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                           <form action="{{route('admin.users.update', $user)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}

                            <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                <label for="InputName">@lang('global.name')</label>
                                <input type="text" name="name" class="form-control" id="InputName" value="{{old('name', $user->name)}}">
                                {!! $errors->first('name', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <div class="form-group" {{ $errors->has('email')? 'has error': ''}}>
                                <label for="InputEmail">@lang('global.email')</label>
                                <input type="text" name="email" class="form-control" id="InputEmail" value="{{old('email', $user->email)}}">
                                {!! $errors->first('email', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <div class="form-group" {{ $errors->has('avatar')? 'has error': ''}}>
                                <label for="avatar">@lang('global.profileimage')</label>
                                <input type="file" class="form-control"
                                id="avatar" name="avatar"/>
                                {!! $errors->first('avatar', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                <p><small>@lang('global.image_settings')</small></p>
                            </div>
                            <hr>
                            <div class="form-group" {{ $errors->has('password')? 'has error': ''}}>
                                <label for="InputPassword">@lang('global.password')</label>
                                <input type="password" name="password" class="form-control" id="InputPassword" value="" placeholder="*">
                                {!! $errors->first('password', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                           </div>

                            <div class="form-group mb-3" {{ $errors->has('password_confirmation')? 'has error': ''}}>
                                <label for="InputPasswordConfirmation">@lang('global.repeatpassword')</label>
                                <input type="password" name="password_confirmation" class="form-control" id="InputPasswordConfirmation" value="" placeholder="*">
                                {!! $errors->first('password_confirmation', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>
                            <small>@lang('global.password_instructions')</small>
                            <hr>

                            <button type="submit" class="btn btn-block btn-primary">@lang('global.updatepersonaldata')</button>

                            </form>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->

                <div class="col-md-5">

                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">@lang('global.roles')</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">

                            @role('Admin')
                                <form  method="POST" action="{{route('admin.users.roles.update', $user)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT')}}

                                    @include('admin.roles.checkboxes')

                                <hr>
                                <button type="submit" class="btn btn-block btn-primary">@lang('global.updateroles')</button>
                                </form>
                            @else
                                <ul>
                                    @forelse ($user->roles as $role )
                                      <li>{{$role->display_name}}</li>
                                    @empty
                                        <li>@lang('global.noroles')</li>
                                    @endforelse
                                </ul>
                            @endrole
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">@lang('global.permissions')</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            @role('Admin')
                                <form  method="POST" action="{{route('admin.users.permissions.update', $user)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT')}}


                                    @include('admin.permissions.checkboxes',['model' => $user])

                                <hr>
                                <button type="submit" class="btn btn-block btn-primary">@lang('global.updatepermissions')</button>
                                </form>
                            @else
                                <ul>
                                    @forelse ($user->permissions as $permission )
                                        <li>{{$permission->name}}</li>
                                    @empty
                                        <li>@lang('global.nopermissions')</li>
                                    @endforelse
                                </ul>
                            @endrole
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
