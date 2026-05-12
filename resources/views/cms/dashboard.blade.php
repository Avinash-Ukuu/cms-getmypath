@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Payment List</h3>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table id="paymentTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Course Mode</th>
                                <th>Batch Type</th>
                                <th>Batch Start</th>
                                <th>Batch Duration</th>
                                <th>Batch Time</th>
                                <th>Batch Days</th>
                                <th>Country</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Gateway</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row"></div>
@endsection
@section('footerScript')
    <script>
        $(function() {

            $('#paymentTable').DataTable({
                processing: true,
                ajax: "{{ url('/cms/payment-data') }}",

                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'course_name'
                    },
                    {
                        data: 'course_mode'
                    },
                    {
                        data: 'batch_type'
                    },
                    {
                        data: 'batch_start'
                    },
                    {
                        data: 'batch_duration'
                    },
                    {
                        data: 'batch_time'
                    },
                    {
                        data: 'batch_days'
                    },
                    {
                        data: 'country'
                    },
                    {
                        data: 'amount'
                    },
                    {
                        data: 'currency'
                    },
                    {
                        data: 'gateway'
                    },
                    {
                        data: 'status'
                    },
                ]
            });

        });
    </script>
@endsection
