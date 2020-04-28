@extends('admin.layout')

@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="/adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('global.rolesall')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}">@lang('global.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('global.rolesall')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                {{-- Cal passar una instancia qualsevol de role --}}
                @can('create', $roles->first())
                    <div class="row mb-2">
                        <a href="{{route('admin.roles.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus mr-1"></i>@lang('global.createrole')</a>
                    </div>
                @endcan

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('global.rolesall')</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="roles-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th>@lang('global.id')</th>
                                    <th>@lang('global.identifier')</th>
                                    <th>@lang('global.name')</th>
                                    <th>@lang('global.permissions')</th>
                                    <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role )
                                            <tr>
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->display_name}}</td>
                                                <td>{{$role->permissions->pluck('display_name')->implode(', ')}}</td>
                                                <td>
                                                @can('update',auth()->user(), $role)
                                                    <a href="{{ route('admin.roles.edit', $role)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                @endcan
                                                @can('delete',auth()->user(), $role)
                                                    @if ($role->id !== 1)
                                                        <form action="{{ route('admin.roles.destroy', $role)}}" method="POST" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button href="#" class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro?')"
                                                            ><i class="fa fa-times"></i></button>
                                                        </form>
                                                    @endif
                                                @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>

@endsection

@push('scripts')
<!-- DataTables -->
    <script src="/adminLte/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function () {
            var locale_lang = "{{app()->getLocale()}}";
            switch(locale_lang) {
                case 'en':
                    var language_datatable = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
                    break;
                case 'es':
                    var language_datatable = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json";
                    break;
                case 'ca':
                    var language_datatable = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json";
                    break;
                default:
                    var language_datatable = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
            };
            $("#roles-table").DataTable({
                "language": {
                        "url": language_datatable
                }
            });
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form role="form" method="POST" action="{{route('admin.roles.store', '#create')}}">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('global.addname')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                            {{-- <label for="InputTitle">Título de la publicación</label> --}}
                          <input type="text" name="name" class="form-control" id="InputTitle" value="{{old('name')}}" placeholder="@lang('global.name')" autofocus>
                            {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('global.cancel')</button>
                    <button class="btn btn-primary">@lang('global.createrole')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endpush



