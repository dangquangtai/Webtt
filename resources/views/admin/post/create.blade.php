@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3">
                <h2>Thêm tin tức</h2>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Quick Example</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/admin/post/store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="post_name">Tiêu đề</label>
                                <input type="text" class="form-control" id="post_name" name="post_name"
                                    placeholder="tin tức dịch thuật ..." required>
                            </div>
                            <div class="form-group">
                                <label for="post_desc">Mô tả</label>
                                <textarea name="post_desc" id="post_desc" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post_image">Ảnh tiêu đề</label>
                                <input type="file" class="form-control" id="post_image" name="post_image" required>
                            </div>
                            <div class="form-group">
                                <label for="post_content">Nội dung</label>
                                <textarea name="post_content" id="post_content" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post_meta_data">Meta Data</label>
                                <input type="text" class="form-control" id="post_meta_data" name="post_meta_data"
                                    placeholder="Tóm tắt nội dung ...">
                            </div>
                            <div class="form-group">
                                <label for="post_keyword">Keyword</label>
                                <input type="text" class="form-control" id="post_keyword" name="post_keyword"
                                    placeholder="Từ khóa ...">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Trạng thái</label>
                                <select class="form-control" id="post_status" name="post_status">
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
            CKEDITOR.replace('post_desc');
            CKEDITOR.replace('post_content',{
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });
        </script>
    @endpush
@endsection
