@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3">
                <h2>Thêm dịch vụ</h2>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Quick Example</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/admin/service/store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="service_name">Tên dịch vụ</label>
                                <input type="text" class="form-control" id="service_name" name="service_name"
                                    placeholder="Dịch vụ dịch thuật ..." required>
                            </div>
                            <div class="form-group">
                                <label for="service_desc">Mô tả</label>
                                <textarea name="service_desc" id="service_desc" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="service_image">Ảnh tiêu đề</label>
                                <input type="file" class="form-control" id="service_image" name="service_image" required>
                            </div>
                            <div class="form-group">
                                <label for="service_content">Nội dung</label>
                                <textarea name="service_content" id="service_content" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="service_meta_data">Meta Data</label>
                                <input type="text" class="form-control" id="service_meta_data" name="service_meta_data"
                                    placeholder="Tóm tắt nội dung ...">
                            </div>
                            <div class="form-group">
                                <label for="service_keyword">Keyword</label>
                                <input type="text" class="form-control" id="service_keyword" name="service_keyword"
                                    placeholder="Từ khóa ...">
                            </div>
                            <div class="form-group">
                                <label for="service_status">Trạng thái</label>
                                <select class="form-control" id="service_status" name="service_status">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
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
            CKEDITOR.replace('service_content',{
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });
        </script>
    @endpush
@endsection
