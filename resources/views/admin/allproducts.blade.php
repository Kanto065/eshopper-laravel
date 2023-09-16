@extends('admin.layouts.tamplate')
@section('page_title')
All Product - Shop4All
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>
    <div class="card">
        <h5 class="card-header">Available All Product Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Img</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td>1</td>
                <td>Fan</td>
                <td></td>
                <td>100</td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-warning">Delete</a>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection