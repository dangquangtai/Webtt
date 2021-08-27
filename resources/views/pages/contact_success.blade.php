@extends('layout')
@section('content')
    <!-- Header -->
    <header class="ex-header bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Yêu cầu của bạn đã được gửi thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.</h1>
                    <h2>Thank you {{$customer_name}}!</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            @foreach ($service as $item)
                <div class="row">
                    <div class="col-xl-3">
                        <img src="{{ URL::asset('uploads/service/' . $item->service_image) }}" style="width: 100%" alt="">
                    </div> <!-- end of col -->
                    <div class="col-xl-9">
                        <a href="{{ URL::to('/service-detail/' . $item->service_slug) }}" class="post">
                            <h4>{{ $item->service_name }}</h4>
                        </a>
                        <p>{!! $item->service_desc !!}</p>
                        <a href="{{ URL::to('/service-detail/' . $item->service_slug) }}"><button
                                class="btn btn-sm btn-outline-secondary">Đọc
                                tiếp </button></a>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <hr class="mb-5">
            @endforeach
            {!! $service->render('vendor.pagination.index') !!}
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->
@endsection
