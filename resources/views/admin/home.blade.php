<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      .sidebar{
        position: fixed;
      }
    </style>
  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="container">
          <div class="card">
          <div class="card-title">
             <h2 class="justify-content-center"> Welcome {{ Auth::user()->name }}</h2>
            </div>
          <div class="card-body">
           <p>Use the Navigation menu</p>
          </div>
        <!-- main-panel ends -->
      </div>
          </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>