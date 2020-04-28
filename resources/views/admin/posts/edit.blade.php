@extends('admin.layout')

@push('styles')
    <!-- daterange picker -->
    <link rel="stylesheet" href="/adminLte/plugins/datepicker/datepicker.min.css">

    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">

    <!-- Select2 -->
  <link rel="stylesheet" href="/adminLte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@lang('global.create-edit')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}">@lang('global.dashboard')</a></li>
                            <li class="breadcrumb-item active">@lang('global.create-edit')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <!-- /.content-header -->

        <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-md-12">
                        @if(session()->has('flash'))
                            <div class="alert alert-success">{{session('flash')}}</div>
                        @endif
                    <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">@lang('global.create-edit')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{route('admin.posts.update', $post)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT')}}

                                <div class="card-body">
                                    <div class="form-group" {{ $errors->has('title')? 'has error': ''}}>
                                        <label for="InputTitle">@lang('global.title')</label>
                                        <input type="text" name="title" class="form-control" id="InputTitle" value="{{old('title', $post->title)}}" placeholder="@lang('global.title')">
                                        {!! $errors->first('title', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                    </div>

                                    <div class="form-group" {{ $errors->has('excerpt')? 'has error': ''}}>
                                        <label>@lang('global.excerpt')</label>
                                        <textarea name="excerpt" class="form-control" rows="2" placeholder="@lang('global.excerpt')...">{{old('excerpt', $post->excerpt)}}</textarea>
                                        {!! $errors->first('excerpt', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                    </div>

                                    <div class="form-group" {{ $errors->has('body')? 'has error': ''}}>
                                        <label>@lang('global.content')</label>
                                        <textarea name="body" class="form-control" id="body_editor" rows="5" placeholder="@lang('global.content')">{{old('body', $post->body)}}</textarea>
                                        {!! $errors->first('body', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                    </div>

                                    <div class="form-group" {{ $errors->has('quote')? 'has error': ''}}>
                                        <label>@lang('global.quote')</label>
                                        <textarea name="quote" class="form-control" rows="2" placeholder="@lang('global.quote')...">{{old('quote', $post->excerpt)}}</textarea>
                                        {!! $errors->first('quote', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('global.addpictures')</label>
                                        <small>@lang('global.addnumpictures')</small>
                                        <div class="dropzone">
                                        </div>
                                    </div>

                                    <div class="form-group" {{ $errors->has('iframe')? 'has error': ''}}>
                                        <label>@lang('global.addvideo')</label>
                                        <textarea name="iframe" class="form-control" rows="2" placeholder="Url del vídeo o audio">{{old('iframe', $post->iframe)}}</textarea>
                                        {!! $errors->first('iframe', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>@lang('global.publishedat')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{old('published_at', $post->published_at ? $post->published_at->format('d-m-Y') : null)}}">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" {{ $errors->has('category_id')? 'has error': ''}}>
                                                <label>@lang('global.categoryonlyone')</label>
                                                    <select name="category_id" class="select-single" multiple="multiple" data-placeholder="@lang('global.category')" style="width: 100%;">
                                                        {{-- <option value="">Selecciona una categoría...</option> --}}
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                                        >{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                {!! $errors->first('category_id', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" {{ $errors->has('tags')? 'has error': ''}}>
                                                <label>Etiquetas</label>
                                                <select name="tags[]" class="select-multiple" multiple="multiple" data-placeholder="@lang('global.tags')" style="width: 100%;" >
                                                    @foreach($tags as $tag)
                                                        <option {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected': ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                                {{-- {!! $errors->first('tags', '<span class="help-block" style="color:red; font-weight:bold;">:message</span>')!!} --}}
                                                @error('tags')
                                                        <span class="help-block" style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @if($post->comments->count() > 0)

                                    @endif
                                </div>
                            <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">@lang('global.save')</button>
                                </div>
                            </form>
                        </div>
                    <!-- /.card -->
                    {{-- Delete pictures --}}
                        @if($post->photos->count() > 0)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">@lang('global.deletepictures')</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($post->photos as $photo)
                                        <div class="col-md-4">
                                            <form action="{{ route('admin.photos.destroy', ['photo' => $photo])}}" method="POST">
                                                {{ @method_field('DELETE')}}
                                                {{ csrf_field() }}
                                                    <button class="btn btn-danger" style="position:absolute; "><i class="far fa-trash-alt xs"></i></button>
                                                    <img src="{{ url($photo->url)}}" width="100%" height="auto" alt="">
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    {{-- Reply comments --}}
                        @if($post->comments->count() > 0)
                            @foreach ($post->comments as $comment)
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Comentario de {{$comment->author}}, {{$comment->created_at->format('d M Y')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="alert alert-info" role="alert">
                                                <p>{{$comment->body}}</p>
                                            </div>

                                @if($comment->reply != null)
                                            <p>Replicado el {{$comment->reply->created_at->format('d M Y')}}</p>
                                            <div class="alert alert-light" role="alert">
                                                <form action="{{ route('admin.replies.destroy', ['reply' => $comment->reply])}}" method="POST">
                                                    {{ @method_field('DELETE')}}
                                                    {{ csrf_field() }}
                                                    {{$comment->reply->body}}
                                                    <button class="btn btn-xs btn-danger" style="float: right"><i class="far fa-trash-alt xs"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                @else
                                    @if (auth()->user()->id == $post->user_id)
                                            <form action="{{ route('admin.comments.reply', $comment)}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                        <textarea name="reply" class="form-control mb-2" rows="2" placeholder="@lang('global.replycomment')">{{old('reply')}}</textarea>
                                                        @error('reply')
                                                                <span class="help-block" style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">@lang('global.replycomment')</button>
                                                    </div>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                                    </div>
                            @endforeach
                        @endif

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>


@endsection

@push('scripts')
<!-- date-range-picker -->
    <script src="/adminLte/plugins/datepicker/datepicker.min.js"></script>
    <script src="/adminLte/plugins/datepicker/datepicker.es.min.js"></script>

<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

<!-- Select2 -->
<script src="/adminLte/plugins/select2/js/select2.full.min.js"></script>

{{-- dropzone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <script>
    $(function () {

        //Date picker
        $('#published_at').datepicker({
            startDate: new Date('01-01-2020'),
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight:true,
            language: 'es',
        })

        // Summernote
        $('#body_editor').summernote({
            tabsize: 2,
            height: 315,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview','help']]
            ]
        });

        $('#body_editor').summernote('removeFormat');

        //Initialize Select2 Category
        $('.select-single').select2({
            tags:true
        });

        //Initialize Select2 Tags
        $('.select-multiple').select2({
            tags:true
        });


        if (Dropzone.instances.length > 0){
            Dropzone.instances.forEach(dz => dz.destroy());
        }

        // Disable auto discover for all elements:
        Dropzone.autoDiscover = false;

        // Dropzone class:
        var myDropzone = new Dropzone(".dropzone",{
            url: "/admin/posts/{{$post->url}}/photos",
            acceptedFiles : 'image/*',
            maxFilesize : 0.7,//Mb
            paramName : 'photo',//nom de l'arxiu després de pujar-lo
            maxFiles: 3,
            resizeWidth: 1140,
            resizeHeight: 550,
            headers : {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            },
            dictDefaultMessage : 'Arrastrar para subir las fotografías'
        });

        myDropzone.on('error',function(file,res){
            //console.log(res.errors.photo[0]);
            var msg = res.errors.photo[0];
            $('.dz-error-messsage:last > span').text(msg);
        });

    });
    </script>;

@endpush


