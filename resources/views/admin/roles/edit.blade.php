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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">@lang('global.editrole')</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                           <form action="{{route('admin.roles.update', $role)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}
                            <div class="form-group">
                                <label for="InputName">@lang('global.identifier')</label>
                                <input type="text" name="name" class="form-control" id="InputName" value="{{$role->name}}" disabled>
                            </div>

                            <div class="form-group" {{ $errors->has('display_name')? 'has error': ''}}>
                                <label for="InputDisplayName">@lang('global.name')</label>
                                <input type="text" name="display_name" class="form-control" id="InputDisplayName" value="{{old('display_name', $role->display_name)}}">
                                {!! $errors->first('display_name', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                            </div>

                            <hr>
                            <label >@lang('global.permissions')</label>
                            @include('admin.permissions.checkboxes',['model' => $role])
                            <hr>
                            <button type="submit" class="btn btn-block btn-primary">@lang('global.update')</button>
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
