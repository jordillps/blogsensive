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
                        <h1 class="m-0 text-dark">@lang('global.permissionsall')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}">@lang('global.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('global.permissionsall')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

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
                                <h3 class="card-title">@lang('global.permissions')</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="permissions-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th>@lang('global.id')</th>
                                    <th>@lang('global.identifier')</th>
                                    <th>@lang('global.name')</th>
                                    <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission )
                                            <tr>
                                                <td>{{$permission->id}}</td>
                                                <td>{{$permission->name}}</td>
                                                <td>{{$permission->display_name}}</td>
                                                <td>
                                                    @can('update', auth()->user(),$permission)
                                                        <a href="{{ route('admin.permissions.edit', $permission)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
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
                default:
                    var language_datatable = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
            };
            $("#permissions-table").DataTable({
                "language": {
                        "url": language_datatable
                }
            });

        });
    </script>


@endpush



