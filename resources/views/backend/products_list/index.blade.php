@extends('layouts.contentNavbarLayout')

@section('title', 'Product Details')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}" ></script>
@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<div class="card mb-4">
    <div class="d-flex justify-content-between align-items-center px-4">
        <h4 class="my-3"><b>Product List</b></h4>
        <div class=""><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#create-product" aria-controls="create-product">Add Product</button>
        </div>
        </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="users-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Weight</th>
                    <th>price</th>
                    <th>Discount</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- offcanvas Create-->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="create-product" aria-labelledby="create-product-Label">
  <div class="offcanvas-header">
    <h5 id="create-product-Label" class="offcanvas-title">Add Product</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body my-auto mx-0 flex-grow-0">
    @include('backend.addProductForm.addProductForm')
  </div>
</div>



<!-- offcanvas edit-->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="edit-product" aria-labelledby="edit-product-Label">
  <div class="offcanvas-header">
    <h5 id="edit-product-Label" class="offcanvas-title">Add Product</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body my-auto mx-0 flex-grow-0 editBlades">
  </div>
</div>












<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
jQuery(document).ready(function($) {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('product.list') }}",
            method: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'Category', name: 'Category' },
            { data: 'productName', name: 'productName' },
            { data: 'weight', name: 'weight' },
            { data: 'price', name: 'price' },
            { data: 'discount', name: 'discount' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
<script>
$(document).ready(function() {
    new PerfectScrollbar('#vertical-example', {
        wheelPropagation: false
    });
    new PerfectScrollbar('#vertical-edit', {
        wheelPropagation: false
    });
});
</script>
<script>
   $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  
  // Get CSRF token value from meta tag
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  
  $.ajax({
    url: "{{ route('admin.product.form.edit') }}",
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': CSRF_TOKEN // Pass CSRF token via header
    },
    data: {
      id: id
    },
    success: function(data) {
      $('.editBlades').html(data.editBlade);
      // $('#first_name').val(data.result.first_name);
      // $('#last_name').val(data.result.last_name);
      // $('#hidden_id').val(id);
      // $('.modal-title').text('Edit Record');
      // $('#action_button').val('Edit');
      // $('#action').val('Edit');
      // $('#formModal').modal('show');
    },
    error: function(xhr, status, error) {
      // Handle error
      console.error(xhr.responseText);
    }
  });
});

</script>
<script>
$(document).ready(function() {
    // Handle delete button click
    $('#users-table').on('click', '.delete-product', function() {
        var productId = $(this).data('id');
        alert(productId);
        // Confirm deletion (optional)
        if (confirm("Are you sure you want to delete this product?")) {
            // AJAX request
            $.ajax({
                url: '/admin/products/' + productId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Remove the row from the datatable
                    $('#product-row-' + productId).remove();
                    alert(response.message); // Optional: Show success message
                },
                error: function(xhr) {
                    alert('Error deleting product.'); // Optional: Show error message
                }
            });
        }
    });
});
</script>

@endsection
