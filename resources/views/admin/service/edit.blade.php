@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3">
                <h2>Chỉnh sửa dịch vụ</h2>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Quick Example</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/admin/service/update/' . $service->service_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="service_name">Tên dịch vụ</label>
                                <input type="text" class="form-control" id="service_name" name="service_name"
                                    placeholder="Dịch vụ dịch thuật ..." required value="{{ $service->service_name }}">
                            </div>
                            <div class="form-group">
                                <label for="service_desc">Mô tả</label>
                                <textarea name="service_desc" id="service_desc"
                                    required>{{ $service->service_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="service_image">Ảnh tiêu đề</label>
                                <input type="file" class="form-control" id="service_image" name="service_image">
                                <br>
                                <img src="{{ URL::asset('uploads/service/' . $service->service_image) }}"
                                    alt="service-img" style="width: 150px">
                            </div>
                            <div class="form-group">
                                <label for="service_content">Nội dung</label>
                                <textarea name="service_content" id="service_content"
                                    required>{{ $service->service_content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="service_meta_data">Meta Data</label>
                                <input type="text" class="form-control" id="service_meta_data" name="service_meta_data"
                                    placeholder="Tóm tắt nội dung ..." value="{{ $service->service_meta_data }}">
                            </div>
                            <div class="form-group">
                                <label for="service_keyword">Keyword</label>
                                <input type="text" class="form-control" id="service_keyword" name="service_keyword"
                                    placeholder="Từ khóa ..." value="{{ $service->service_keyword }}">
                            </div>
                            <div class="form-group">
                                <label for="service_status">Trạng thái</label>
                                <select class="form-control" id="service_status" name="service_status">
                                    @if ($service->service_status == 0)
                                        <option value="0" selected>Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    @else
                                        <option value="0">Hiển thị</option>
                                        <option value="1" selected>Ẩn</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    @push('custom-scripts')
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace('service_desc');
            CKEDITOR.replace('service_content', {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });
        </script>
    @endpush
@endsection
