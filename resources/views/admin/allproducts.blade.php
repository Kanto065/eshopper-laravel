@extends('admin.layouts.tamplate')
@section('page_title')
All Product - Shop4All
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>
    @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message')}}
          </div>
        @endif
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
              @foreach($products as $product)
                
              
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>
                  <img style="height: 100px;" src="{{asset($product->product_img)}}" alt="">
                  <br>
                  <a href="{{route('editproductimg', $product->id)}}" class="btn btn-primary">Update Image</a>
                </td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-warning">Delete</a>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection