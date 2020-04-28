@extends('layouts.layout')



@section('content')


  <!--================ Hero sm Banner start =================-->
  {{-- <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>{{$post->title}}</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">@lang('pages.by') {{$post->owner->name}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section> --}}
  <!--================ Hero sm Banner end =================-->




  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="main_blog_details">
                        <div class="text-center">
                            @if($post->photos->count() > 0)
                                <img class="img-fluid" src="{{ $post->photos->first()->url}}" alt="">
                            @else
                                <img class="img-fluid" src="/img/banner/hero-banner-2.png" alt="">
                            @endif
                        </div>
                        <a href="#"><h4>{{$post->title}}</h4></a>
                        <div class="user_details">
                            <div class="float-left">
                                @foreach($post->tags as $tag)
                                    <a href="#0">{{$tag->name}}</a>
                                @endforeach
                            </div>
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{$post->owner->name}}</h5>
                                        <p>{{ optional($post->published_at)->format('d-M-Y')}}</p>
                                    </div>
                                    <div class="d-flex">
                                        @if ($post->owner->avatar == 'avatar-icon.png')
                                            <img src="/img/avatars/avatar-icon.png" class="img-fluid" height="60" width="60" alt="User Image">
                                        @else
                                            <img src="/storage/avatars/{{$post->owner->avatar}}" class="img-fluid" height="60" width="60" alt="User Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!!$post->body!!}

                        <blockquote class="blockquote">
                            <p class="mb-0">{{$post->quote}}</p>
                        </blockquote>

                        <div class="text-center">
                            @if($post->photos->count() > 1)
                                <img class="img-fluid" src="{{ $post->photos->skip(1)->first()->url}}">
                            @endif
                        </div>


                        <div class="news_d_footer flex-column flex-sm-row">
                            {{-- <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a> --}}
                            {{-- <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>{{$post->comments->count()}} @lang('pages.comments')</a> --}}
                            <a href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>{{$post->comments->count()}} @lang('pages.comments')</a>
                            <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter-alt"></i></a>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                        </div>
                    </div>


                <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                @if($previous == null)
                                    <div class="detials">
                                        <p>@lang('pages.previouspost')</p>
                                    </div>
                                @else
                                    <div class="thumb">
                                        @if($previous->photos->count() > 0)
                                            <a href="{{route('posts.show', $previous)}}"><img class="img-fluid" src="{{ $previous->photos->first()->url}}" alt=""></a>
                                        @else
                                            <a href="{{route('posts.show', $previous)}}"><img class="img-fluid" src="/img/blog/prev.jpg" alt=""></a>
                                        @endif
                                    </div>
                                    <div class="arrow">
                                        <a href="{{route('posts.show', $previous)}}"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>@lang('pages.previouspost')</p>
                                        <a href="{{route('posts.show', $previous)}}"><h4>{{$previous->title}}</h4></a>
                                    </div>
                                @endif

                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                @if($next == null)
                                    <div class="detials">
                                        <p>@lang('pages.nextpost')</p>
                                    </div>
                                @else
                                    <div class="detials">
                                        <p>@lang('pages.nextpost')</p>
                                        <a href="{{route('posts.show', $next)}}"><h4>{{$next->title}}</h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{route('posts.show', $next)}}"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        @if($next->photos->count() > 0)
                                            <a href="{{route('posts.show', $next)}}"><img class="img-fluid" width="60" src="{{ $next->photos->first()->url}}" alt=""></a>
                                        @else
                                            <a href="{{route('posts.show', $next)}}"><img class="img-fluid" src="/img/blog/next.jpg" alt=""></a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        </div>
                        @if($post->comments->count() > 0)

                            <div class="comments-area">
                                <h4>{{$post->comments->count()}} comments</h4>
                                @foreach ($post->comments as $comment)
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                {{-- <div class="thumb">
                                                    <img src="img/blog/c1.jpg" alt="">
                                                </div> --}}
                                                <div class="desc">
                                                    <h5><a href="#">{{$comment->author}}</a></h5>
                                                    <p class="date">{{$comment->created_at->format('d-m-Y')}}</p>
                                                    <p class="comment">
                                                        {{$comment->body}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($comment->reply != null)
                                        <div class="comment-list left-padding">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c2.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">@lang('pages.repliedbytheauthor')</a></h5>
                                                        <p class="date">{{$comment->reply->created_at->format('d M Y')}}</p>
                                                        <p class="comment">
                                                            {{$comment->reply->body}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <div class="comment-form">
                            <h4>@lang('pages.leaveacomment')</h4>
                            <form name="commentForm" id="commentForm" action="{{route('comments.store', $post)}}" method="POST" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name" {{ $errors->has('author')? 'has error': ''}}>
                                        <input type="text" name="author" class="form-control" placeholder="@lang('pages.nameform')"id="InputAuthor" value="{{old('author')}}">
                                        {!! $errors->first('author', '<span class="help-block" style="color:red;">:message</span>')!!}
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email" {{ $errors->has('email')? 'has error': ''}}>
                                        <input type="email" name="author_email" class="form-control" id="InputEmailAuthor" placeholder="@lang('pages.emailform')" value="{{old('author_email')}}">
                                        {!! $errors->first('author_email', '<span class="help-block" style="color:red;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="form-group" {{ $errors->has('body')? 'has error': ''}}>
                                    <textarea name="body" class="form-control mb-10" rows="5" placeholder="@lang('pages.commentform')">{{old('body')}}</textarea>
                                    {!! $errors->first('body', '<span class="help-block" style="color:red;">:message</span>')!!}
                                </div>
                                <button type="submit" class="button submit_btn">@lang('pages.sendcomment')</button>
                            </form>
                        </div>
                </div>


        </div>
  </section>
  <!--================ End Blog Post Area =================-->

@endsection
