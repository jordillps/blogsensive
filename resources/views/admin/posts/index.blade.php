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
                        <h1 class="m-0 text-dark">@lang('global.allposts')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}">@lang('global.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('global.allposts')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mb-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-1"></i>@lang('global.createpost')</button>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('global.allposts')</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="posts-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th>@lang('global.id')</th>
                                    <th>@lang('global.title')</th>
                                    <th>@lang('global.excerpt')</th>
                                    <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post )
                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->excerpt}}</td>
                                                <td>
                                                <a href="{{ route('posts.show', $post)}}" class="btn btn-xs btn-light" target="_blank"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                @can('delete',auth()->user(), $post)
                                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-times"></i></button>
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
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('admin.posts.destroy', $post)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE')}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('global.confirmdelete')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>@lang('global.sure')</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('global.cancel')</button>
                    <button class="btn btn-primary">@lang('global.delete')</button>
                    </div>
                </div>
            </div>
        </form>
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
            $("#posts-table").DataTable({
                "language": {
                        "url": language_datatable
                }
            });
        });
    </script>


@endpush



