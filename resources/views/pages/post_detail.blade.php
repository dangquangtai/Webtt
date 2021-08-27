@extends('layout')
@section('content')
     <!-- Header -->
     <header class="ex-header bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>{{$post->post_name}}</h1>
                    <p>Thời gian đăng: {{ $post->created_at }} <br> Lượt xem: {{ $post->post_view_count }}</p>
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
                     {!!$post->post_content!!}
                    <a class="btn-solid-reg mt-5 mb-5" href="index.html#download">Liên hệ</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->
@endsection