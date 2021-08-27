@extends('admin_layout')
@section('admin_content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết liên hệ ({{ $contact->contact_id }})</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if ($contact->contact_status == 0)
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Trạng thái:</h5>
                            Đang chờ xử lý
                        </div>
                    @else
                        <div class="callout callout-success">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            Đã xử lý
                        </div>
                    @endif
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Thông tin
                                    <small class="float-right">Thời gian: {{ $contact->created_at }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <br>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    Khách hàng: <strong>{{ $contact->contact_name }}</strong><br>
                                    Địa chỉ: {{ $contact->contact_address }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    Email: <b>{{ $contact->contact_email }}</b>
                                    <br>
                                    Số điện thoại: <b>{{ $contact->contact_phone }}</b>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Thông điệp: {{ $contact->contact_desc }}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-md-10">
                                <label for="contact_content">Nội dung:</label>
                                <br>
                                <textarea name="contact_content" id="contact_content"
                                    required>{{ $contact->contact_content }}</textarea>
                            </div>
                        </div>
                        <!-- /.row -->

                        <br>
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="mailto::{{ $contact->contact_email }}" target="_blank" class="btn btn-default"><i
                                        class="fas fa-envelope"></i> Email</a>
                                <a href="{{URL::to('/admin/contact/status-success/'.$contact->contact_id)}}">
                                    <button type="button" class="btn btn-success float-right">
                                        Đã xử lý
                                    </button>
                                </a>
                                <a href="{{URL::to('/admin/contact/status-pending/'.$contact->contact_id)}}">
                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        Đang chờ xử lý
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @push('custom-scripts')
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace('contact_content');
        </script>
    @endpush
@endsection
