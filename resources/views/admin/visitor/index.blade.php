@extends('admin_layout')

@section('admin_content')
    <!-- /.row -->
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách ip truy cập</h3>
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
                                    <th>id</th>
                                    <th>ip</th>
                                    <th>count</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitor as $item => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->ip }}</td>
                                        <td>{{ $value->count }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>
                <div class="card-tools">
                    {!! $visitor->render('vendor.pagination.index') !!}
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection
