@extends('layouts.contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>


<div class="card mb-4">
    <div class="d-flex justify-content-between align-items-center px-4">
        <h4 class="my-3"><b>Customer Querys</b></h4>
    </div>
</div>
<div class="card">
    <div class="card-body table-responsive">
        <table id="order-list-table" class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Customer Name</th>
                    <th>E-mail Id</th>
                    <th>Mobile No</th>

                    <th>Comment</th>
                    <th>Website Rating</th>
                    <th>created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('#order-list-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.customer.query.index') }}",
                method: 'GET',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'customerName',
                    name: 'customerName'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'contactNo',
                    name: 'contactNo'
                },
                {
                    data: 'customerComment',
                    name: 'customerComment'
                },
                {
                    data: 'websiteRating',
                    name: 'websiteRating'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
@endsection