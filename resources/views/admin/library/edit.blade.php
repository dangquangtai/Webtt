@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3">
                <h2>Chỉnh sửa bài viết</h2>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Quick Example</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/admin/library/update/'.$library->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tên bài viết</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="tin tức dịch thuật ..." required value="{{ $library->name }}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả</label>
                                <textarea name="desc" id="desc"
                                    required>{{ $library->desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh tiêu đề</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <br>
                                <img src="{{ URL::asset('uploads/library/' . $library->image) }}"
                                    alt="library-img" style="width: 150px">
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content"
                                    required>{{ $library->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_data">Meta Data</label>
                                <input type="text" class="form-control" id="meta_data" name="meta_data"
                                    placeholder="Tóm tắt nội dung ..." value="{{ $library->meta_data }}">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"
                                    placeholder="Từ khóa ..." value="{{ $library->keyword }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select class="form-control" id="status" name="status">
                                    @if ($library->status == 0)
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
            CKEDITOR.replace('desc');
            CKEDITOR.replace('content', {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });
        </script>
    @endpush
@endsection
