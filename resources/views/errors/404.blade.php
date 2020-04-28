@extends('layouts.layout')


@section('content')

         <!--================Hero Banner start =================-->
         <section class="mb-30px">
            <div class="container">
                <div class="hero-banner" style="opacity: 0.7;">
                    <div class="hero-banner__content">
                        <h1 style="color: black;">@lang('pages.pagenotfound')</h1>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        {{-- <div style="text-align:center; padding: 40vh 0;">
            <h1>@lang('pages.pagenotfound')</h1>
        </div> --}}
@endsection
