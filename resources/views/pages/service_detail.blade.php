@extends('content_layout')
@section('content_page')
    <!-- Header -->
    <header class="ex-header bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>{{ $service->service_name }}</h1>
                    <p>Thời gian đăng: {{ $service->created_at }} <br> Lượt xem: {{ $service->service_view_count }}</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    {!! $service->service_content !!}
                    <a class="btn-solid-reg mt-5 mb-5" href="{{ URL::to('/contact') }}">Liên hệ</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->
@endsection
