@extends('admin_layout')

@section('admin_content')
    <!-- /.row -->
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách tin tức</h3>
                        <span style="color: red">
                            @php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<br>' . $message;
                                    Session::put('message', null);
                                }
                            @endphp</span>

                        <div class="card-tools">
                            <select name="select_quantity_view" class="form-control">
                                <option value="">Hiển thị: {{ count($all_post) }}</option>
                                <option value="9">9</option>
                                <option value="18">18</option>
                                <option value="27">27</option>
                                <option value="36">36</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên tin tức</th>
                                    <th>Lượt xem</th>
                                    <th>Trạng thái</th>
                                    <th>Thay đổi</th>
                                </tr>
                            </thead>
                            <style>
                                #post_order .ui-state-highlight {
                                    padding: 24px;
                                    background-color: #ffffcc;
                                    border: 1px dotted #ccc;
                                    cursor: move;
                                    margin-top: 12px;
                                }

                            </style>
                            <tbody id="post_order">
                                @foreach ($all_post as $item => $value)
                                    <tr id="{{ $value->post_id }}">
                                        <td>{{ $value->post_id }}</td>
                                        <td>{{ $value->post_name }}</td>
                                        <td>{{ $value->post_view_count }}</td>
                                        <td class="text-nowrap">{{ $value->post_status == 0 ? 'Hiển thị' : 'Ẩn' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ URL::to('/admin/post/edit/' . $value->post_id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Bạn có chắc muốn xoá!')"
                                                href="{{ URL::to('/admin/post/destroy/' . $value->post_id) }}"
                                                class="btn btn-danger btn-sm" title="Xoá"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/post/create') }}"><button class="btn btn-outline-info">Thêm tin
                            tức</button></a>
                    {!! $all_post->render('vendor.pagination.index') !!}
                </div>

                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </div>
    @push('custom-scripts')
        <script>
            $(function() {
                $('select[name=select_quantity_view]').on('change', function() {
                    var value = $(this).val();
                    var url = $('input[name=my_url]').val();
                    console.log(value)
                    window.location.href = url + '/admin/change-quantity-view/' + value
                });

                $('#post_order').sortable({
                    placeholder: 'ui-state-highlight',
                    update: function(event, ui) {
                        var _token = $('input[name=_token]').val();
                        var url = $('input[name=my_url]').val();
                        var page_id_array = new Array();
                        $('#post_order tr').each(function() {
                            page_id_array.push($(this).attr('id'));
                        });
                        $.ajax({
                            type: "POST",
                            url: url + '/admin/post/arrange-post',
                            data: {
                                page_id_array: page_id_array,
                                _token: _token
                            },
                            dataType: "html",
                            success: function(data) {
                                console.log(data);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                        console.log(page_id_array);
                    }
                });
            });
        </script>
    @endpush
@endsection
