@extends('admin.layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">@lang('global.createuser')</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                           <form action="{{route('admin.users.store')}}" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                    <label for="InputName">@lang('global.name')</label>
                                    <input type="text" name="name" class="form-control" id="InputName" value="{{old('name')}}">
                                    {!! $errors->first('name', '<span class="help-block" style="color:red;">:message</span>')!!}
                                </div>

                                <div class="form-group" {{ $errors->has('email')? 'has error': ''}}>
                                    <label for="InputEmail">@lang('global.email')</label>
                                    <input type="text" name="email" class="form-control" id="InputEmail" value="{{old('email')}}">
                                    {!! $errors->first('email', '<span class="help-block" style="color:red;">:message</span>')!!}
                                </div>
                                <hr>
                                <label >@lang('global.roles')</label>

                                @include('admin.roles.checkboxes')
                                <hr>
                                <label >@lang('global.permissions')</label>
                                @include('admin.permissions.checkboxes',['model' => $user])
                                <hr>
                                <p><small>@lang('global.generatepassword')</small></p>
                                <button type="submit" class="btn btn-block btn-primary">@lang('global.create')</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
