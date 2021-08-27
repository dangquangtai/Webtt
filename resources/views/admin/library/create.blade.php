@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3">
                <h2>Thêm bài viết</h2>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Quick Example</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/admin/library/store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="bài viết dịch thuật ..." required>
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả</label>
                                <textarea name="desc" id="desc" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh tiêu đề</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_data">Meta Data</label>
                                <input type="text" class="form-control" id="meta_data" name="meta_data"
                                    placeholder="Tóm tắt nội dung ...">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"
                                    placeholder="Từ khóa ...">
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select class="form-control" id="status" name="status">
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
            CKEDITOR.replace('desc');
            CKEDITOR.replace('content',{
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });
        </script>
    @endpush
@endsection
