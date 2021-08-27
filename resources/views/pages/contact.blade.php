@extends('layout')
@section('content')
    <!-- Header -->
    <header class="ex-header bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Liên hệ</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Gửi yêu cầu của bạn</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ URL::to('/send-contact') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ tên:</label>
                                    <input type="text" class="form-control" name="contact_name" placeholder="John Dang..."
                                        required value="{{ old('contact_name') }}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" name="contact_email"
                                        placeholder="John Dang@..." required value="{{ old('contact_email') }}">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại:</label>
                                    <input type="text" class="form-control" name="contact_phone" placeholder="09xxxxxx"
                                        required value="{{ old('contact_phone') }}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <input type="text" class="form-control" name="contact_address"
                                        placeholder="06 Le Loi,..." required value="{{ old('contact_address') }}">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Thông điệp:</label>
                                    <textarea class="form-control" name="contact_desc" id="" cols="30" rows="5">{{ old('contact_desc') }}</textarea>
                                </div>
                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                <br />
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="small">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-8">
                                <div class="form-group">
                                    <label>Nội dung:</label>
                                    <textarea name="contact_content" id="contact_content">{!! old('contact_content') !!}</textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <input class="btn btn-primary" type="submit" value="Gửi đi">
                        <!-- /.row -->
                    </div>
                </form>
                <!-- /.card-body -->
                <div class="card-footer">
                    Quý khách có thể đính kèm ảnh hoặc link file cần dịch.
                </div>
            </div>

        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->
    @push('custom-scripts')
        <script>
            $(function() {
                // Summernote
                CKEDITOR.replace('contact_content', {
                    filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
                    filebrowserUploadMethod: "form"
                });
            })
        </script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    @endpush
@endsection
