@extends('admin_layout')

@section('admin_content')
    <!-- /.row -->
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách liên hệ từ khách hàng</h3>
                        <span style="color: red">
                            @php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<br>' . $message;
                                    Session::put('message', null);
                                }
                            @endphp</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên khách hàng</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Thông điệp</th>
                                    <th>Trạng thái</th>
                                    <th>Thay đổi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_contact as $item => $value)
                                    <tr>
                                        <td>{{ $value->contact_id }}</td>
                                        <td>{{ $value->contact_name }}</td>
                                        <td>{{ $value->contact_phone }}</td>
                                        <td>{{ $value->contact_email }}</td>
                                        <td>{{ $value->contact_desc }}</td>
                                        <td class="text-nowrap">
                                            {!! $value->contact_status == 0
    ? '<span class="badge badge-secondary">Đang chờ xử lý</span>'
    : '<span class="badge badge-success">Đã xử lý</span>' !!}
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{{ URL::to('/admin/contact/show/' . $value->contact_id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            <a onclick="return confirm('Bạn có chắc muốn xoá!')"
                                                href="{{ URL::to('/admin/contact/destroy/' . $value->contact_id) }}"
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
                    {!! $all_contact->render('vendor.pagination.index') !!}
                </div>

                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection
