@extends('layouts.layout')



@section('content')

    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>@lang('pages.yourblog')</h3>
                    <h1>@lang('pages.yourstories')</h1>
                </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        <!--================ Blog slider start =================-->
        {{-- <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide1.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Fashion</a>
                    <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                    <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide2.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Fashion</a>
                    <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                    <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide3.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Fashion</a>
                    <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                    <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide1.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Fashion</a>
                    <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                    <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide2.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Fashion</a>
                    <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                    <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide3.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Fashion</a>
                    <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                    <p>2 days ago</p>
                    </div>
                </div>
                </div>
            </div>
        </section> --}}
        <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($posts as $post)
                            <div class="single-recent-blog-post">
                                @if($post->photos->count() > 0)
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{ $post->photos->first()->url}}" alt="">
                                        <ul class="thumb-info">
                                            <li><i class="ti-user"></i>@lang('pages.by') {{$post->owner->name}}</li>
                                            <li><i class="ti-notepad"></i>{{$post->published_at->format('d-m-Y')}}</li>
                                            <li><i class="ti-themify-favicon"></i>{{$post->comments->count()}} @lang('pages.comments')</li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="thumb">
                                        <img class="img-fluid" src="/img/blog/blog4.png" alt="">
                                        <ul class="thumb-info">
                                            <li><i class="ti-user"></i>@lang('pages.by') {{$post->owner->name}}</li>
                                            <li><i class="ti-notepad"></i>{{$post->published_at->format('d-m-Y')}}</a></li>
                                            <li><i class="ti-themify-favicon"></i>{{$post->comments->count()}} @lang('pages.comments')</li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="details mt-20">
                                    <a href="{{route('posts.show', $post)}}">
                                        <h3>{{$post->title}}</h3>
                                    </a>
                                    <p class="tag-show">
                                        @foreach($post->tags as $tag)
                                            <a href="#0">{{$tag->name}}</a>
                                        @endforeach
                                    </p>
                                    <p>{{$post->excerpt}}</p>
                                    <a class="button" href="{{route('posts.show', $post)}}">@lang('pages.read')<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach

                        {{$posts->links()}}
                    </div>

                    <!-- Start Blog Post Siddebar -->
                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="single-sidebar-widget__title">@lang('pages.newsletter')</h4>
                            <div class="form-group mt-30">
                                <div class="col-autos">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'">
                                </div>
                            </div>
                            <button class="bbtns d-block mt-20 w-100">@lang('pages.subscribe')</button>
                            </div>


                            <div class="single-sidebar-widget post-category-widget">
                                <h4 class="single-sidebar-widget__title">@lang('pages.categories')</h4>
                                <ul class="cat-list mt-20">
                                    @forelse ($categories as $category)
                                        <li>
                                            <a href="{{route('categories.show', $category)}}" class="d-flex justify-content-between">
                                                <p>{{$category->name}}</p>
                                                <p>({{$category->posts->count()}})</p>
                                            </a>
                                        </li>
                                    @empty
                                        <p>@lang('pages.nocategories')</p>
                                    @endforelse
                                </ul>
                            </div>

                            {{-- <div class="single-sidebar-widget popular-post-widget">
                                <h4 class="single-sidebar-widget__title">@lang('pages.popularposts')</h4>
                                <div class="popular-post-list">
                                    <div class="single-post-list">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="img/blog/thumb/thumb1.png" alt="">
                                            <ul class="thumb-info">
                                            <li><a href="#">Adam Colinge</a></li>
                                            <li><a href="#">Dec 15</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="blog-single.html">
                                            <h6>Accused of assaulting flight attendant miktake alaways</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="single-sidebar-widget writers-post-widget">
                                <h4 class="single-sidebar-widget__title">@lang('pages.listofwriters')</h4>
                                <div class="popular-post-list">
                                    @foreach ($writers as $writer)
                                        <div class="single-post-list">
                                            <div class="thumb">
                                                @if ($writer->avatar == 'avatar-icon.png')
                                                    <img class="card-img-writer rounded-0" src="/img/avatars/avatar-icon.png"  alt="User Image">
                                                @else
                                                    <img  class="card-img-writer rounded-0" src="/storage/avatars/{{$writer->avatar}}"  alt="User Image">
                                                @endif
                                                    {{-- <img class="card-img-writer rounded-0" src="img/blog/c1.jpg" alt=""> --}}
                                                <ul class="thumb-info">
                                                    <li>
                                                        <span><a href="{{route('users.show', $writer)}}">{{$writer->name}}</a></span>
                                                        <span><a href="#">({{$writer->posts->count()}})</a></span>
                                                    </li>                                                                                                                </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="single-sidebar-widget__title">@lang('pages.tags')</h4>
                                <ul class="list">
                                    @forelse ($tags as $tag )
                                        <li><a href="{{route('tags.show', $tag)}}">{{$tag->name}}</a></li>
                                    @empty
                                        <p>@lang('pages.notags')</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Post Siddebar -->
            </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>

@endsection
