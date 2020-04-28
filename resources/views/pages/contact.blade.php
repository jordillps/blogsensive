@extends('layouts.layout')


@section('content')
    <!--================ Hero sm banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>Contacte</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Si voleu formar-ne part. Contacteu amb nosaltres</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                        <h3>Mollerussa</h3>
                        <p>Lleida</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                        <h3><a href="mailto:hola@formalweb.cat">hola@formalweb.cat</a></h3>
                        <p>Contacteu amb nosaltres</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                {{-- <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate"> --}}
                <form name="contactForm" id="contactForm" action="{{route('pages.contactform')}}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group" {{ $errors->has('name')? 'has error': ''}}>
                                <input type="text" class="form-control" name="name" placeholder="@lang('pages.nameform')" id="InputName" value="{{old('name')}}">
                                {!! $errors->first('name', '<span class="help-block" style="color:red;">:message</span>')!!}
                            </div>
                            <div class="form-group" {{ $errors->has('email')? 'has error': ''}}>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="@lang('pages.emailform')" value="{{old('email')}}">
                                {!! $errors->first('email', '<span class="help-block" style="color:red;">:message</span>')!!}
                            </div>
                            <div class="form-group" {{ $errors->has('subject')? 'has error': ''}}>
                                <input type="text" class="form-control" name="subject" id="subject"  placeholder="@lang('pages.subjectform')" value="{{old('subject')}}">
                                {!! $errors->first('subject', '<span class="help-block" style="color:red;">:message</span>')!!}
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group" {{ $errors->has('message')? 'has error': ''}}>
                                <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="6" placeholder="@lang('pages.messageform')">{{old('message')}}</textarea>
                                {!! $errors->first('message', '<span class="help-block" style="color:red;">:message</span>')!!}
                            </div>
                            @if(session()->has('flash'))
                                <div class="alert alert-success">{{session('flash')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">@lang('pages.sendmessage')</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
	<!-- ================ contact section end ================= -->
@endsection
