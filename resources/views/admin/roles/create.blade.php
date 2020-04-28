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
                            <h3 class="card-title">Crear Rol</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                           <form action="{{route('admin.roles.store')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                <label for="InputName">@lang('global.identifier')</label>
                                <input type="text" name="name" class="form-control" id="InputName" value="{{old('name')}}">
                                {!! $errors->first('name', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <div class="form-group" {{ $errors->has('display_name')? 'has error': ''}}>
                                <label for="InputDisplayName">@lang('global.name')</label>
                                <input type="text" name="display_name" class="form-control" id="InputDisplayName" value="{{old('display_name')}}">
                                {!! $errors->first('display_name', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <hr>
                            <label >@lang('global.permissions')</label>
                            @include('admin.permissions.checkboxes',['model' => $role])
                            <hr>
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
