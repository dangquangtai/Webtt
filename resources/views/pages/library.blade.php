@extends('layout')
@section('content')
    <!-- Header -->
    <header class="ex-header bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Thư viện</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            @foreach ($library as $item)
                <div class="row">
                    <div class="col-xl-3">
                        <img src="{{ URL::asset('uploads/library/' . $item->image) }}" style="width: 100%" alt="">
                    </div> <!-- end of col -->
                    <div class="col-xl-9">
                        <a href="{{ URL::to('/library-detail/' . $item->slug) }}" class="post">
                            <h4>{{ $item->name }}</h4>
                        </a>
                        <p>{!! $item->desc !!}</p>
                        <a href="{{ URL::to('/library-detail/' . $item->slug) }}"><button class="btn btn-sm btn-secondary">Đọc
                                tiếp </button></a>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <hr class="mb-5">
            @endforeach

            {!! $library->render('vendor.pagination.index') !!}
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->
@endsection
