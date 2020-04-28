@extends('layouts.layout')



@section('content')

    <!--================ Hero sm Banner start =================-->
    <section class="mb-30px">
        <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
            <h1>{{$user}}</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="#">{{$category}}</a></li> --}}
                {{-- <li class="breadcrumb-item active" aria-current="page">@lang('pages.user') {{$user}}</li> --}}
                </ol>
            </nav>
            </div>
        </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                            @forelse ($posts as $post)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                        <img class="card-img rounded-0" src="/img/blog/thumb/thumb-card1.png" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#"><i class="ti-user"></i>{{$post->owner->name}}</a></li>
                                            <li><i class="ti-themify-favicon"></i>{{$post->comments->count()}} @lang('pages.comments')</li>
                                        </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="{{route('posts.show', $post)}}">
                                                <h3>{{$post->title}}</h3>
                                            </a>
                                            <p>{{$post->excerpt}}</p>
                                            <a class="button" href="{{route('posts.show', $post)}}">@lang('pages.read') <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="details mt-20">
                                            <h5>@lang('pages.nopostscategory')</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                    </div>
                    {{$posts->links()}}
                </div>

                <!-- Start Blog Post Siddebar -->
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="single-sidebar-widget__title">@lang('pages.newsletter')</h4>
                            <div class="form-group mt-30">
                            <div class="col-autos">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter email'">
                            </div>
                            </div>
                            <button class="bbtns d-block mt-20 w-100">@lang('pages.subscribe')</button>
                        </div>


                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="single-sidebar-widget__title">@lang('pages.category')</h4>
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
                                            <li><a href="{{route('users.show', $writer)}}">{{$writer->name}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="single-sidebar-widget__title">@lang('pages.tags')</h4>
                            <ul class="list">
                                <li>
                                    @forelse ($tags as $tag )
                                        <li><a href="{{route('tags.show', $tag)}}">{{$tag->name}}</a></li>
                                    @empty
                                        <p>@lang('pages.notags')</p>
                                    @endforelse
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->

@endsection
