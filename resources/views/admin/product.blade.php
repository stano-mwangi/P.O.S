<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    </style>
  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
<div class="alert alert-success alter-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session()->get('message')}}
</div>
            @endif
            <div>
    
   </div>
   <div class="container">
   @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

   <form action="{{ url('/importProducts') }}" class="forms-sample mb-2" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="file">Choose CSV File</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary ">Import products</button>
        </form>
   <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
    @csrf
   <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                 
                    <h4 class="card-title mt-2">Add a Product</h4>

                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="exampleInputName1" placeholder="Product Name" required="">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail3" placeholder="description" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="number" class="form-control" min="0" name="price" id="exampleInputPassword4" placeholder="Price" required="">
                      </div>
                      <div class="form-group">
                        <label for="discount_price">Discount Price</label>
                        <input type="number" class="form-control" min="0" id="exampleInputPassword4" placeholder="Discount_price">
                      </div>
                      <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" min="0" name="quantity" id="exampleInputPassword4" placeholder="Quantity">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control " name="category" id="exampleSelectGender">
                        @if(isset($category) && count($category)>0)
    @foreach($category as $category)
    <option>{{$category->category}}</option>
    @endforeach
    @endif
                        </select>
                      </div>
                     
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      
                    </form>
                    <button class="btn rounded-pill btn-success mt-2"><a class="nav-link" href="{{url('/show_product')}}">Show Products</a></button>
                  </div>
                </div>
              </div>
             
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>