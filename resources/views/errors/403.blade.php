@extends('admin.layout')


@section('content')

    <div style="text-align:center; padding: 200px 0;">

        <h1>@lang('pages.notautorized')</h1>
        <p><a href="{{url()->previous()}}">Regresar</a></p>
    </div>

@endsection
