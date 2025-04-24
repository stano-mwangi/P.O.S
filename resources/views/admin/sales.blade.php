<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      .strikethrough {
            text-decoration: line-through;
            color: red;
        }
        body{
          margin:0px;
          border:0px;
        }
        .scroll-container {
            width: auto;
            height: 100vw;
            overflow: auto;
            cursor: grab;
            user-select: none; /* Disable text selection */
        }
        .scroll-container:active {
            cursor: grabbing;
        }
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
  <div class="card ">
    <form  class="form-group"method="get" action="{{url('/searchSales')}}">
      <div class="card-body">
<input class="input-group mb-2 " name="searchSales" placeholder="search sales..." value="{{isset($searchSales) ? $searchSales : ''}}">
<button type="submit" class="btn btn-success">Search</button>
    </form>
<form action="{{ url('/filterSalesAdmin') }}" method="POST" class="form-inline mt-2">
    @csrf
    <div class="form-group">
        <label for="from_date">From Date:</label>
        <input type="date" class="form-control ml-2" id="from_date" name="from_date" required>
    </div>
    <div class="form-group mx-2">
        <label for="to_date">To Date:</label>
        <input type="date" class="form-control ml-2" id="to_date" name="to_date" required>
    </div>
    <div class="form-group ml-4">
        <button type="submit" class="button rounded-pill btn-primary mb-4">Filter Sales</button>
    </div>
</form>
<button class="button btn-alert rounded-pill mb-3">
        <a class="nav-item" href="{{ url()->previous() }}">Back</a>
    </button>
    <div class=" mt-4">
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
    <a href="{{ url('/exportSales') }}" class="btn btn-primary">Export Sales</a>
</div>
</div>
</div>
<div class="scroll-container" id="scroll-container">
<div class=" table-responsive">
               <table class="table table-bordered jsgrid jsgrid-table dataTables_wrapper table-primary ">
               <thead>
                            <tr>
                                <th>Sale ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Active Price</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="sales-data">
                            @php
                                $currentCartId = null;
                            @endphp

                            @foreach($sales as $sale)
                                @if($currentCartId !== null && $currentCartId !== $sale->cart_id)
                                    <tr class="total-row" data-total="{{ $previousTotal }}">
                                        <th colspan="4">Total:</th>
                                        <td colspan="3">{{ $previousTotal }}</td>
                                    </tr>
                                @endif

                                @if($currentCartId !== $sale->cart_id)
                                    @php
                                        $currentCartId = $sale->cart_id;
                                        $previousTotal = $sale->total;
                                    @endphp
                                @endif

                                <tr>
                                    <td>{{ $sale->cart_id }}</td>
                                    <td>{{ $sale->product_name }}</td>
                                    <td>{{ $sale->description }}</td>
                                    <td>
                                        @if($sale->active_price)
                                            <span class="strikethrough">{{ $sale->price }}</span>
                                        @else
                                            {{ $sale->price }}
                                        @endif
                                    </td>
                                    <td>{{ $sale->active_price ?? 'N/A' }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->updated_at }}</td>
                                    <td>
                <a onclick="return confirm('Are you sure you want to Delete this')" class="btn btn-danger" href="{{url('/deleteSale',$sale->id)}}">Delete</a>
                </td>
                                </tr>
                            @endforeach

                            @if($currentCartId !== null)
                                <tr class="total-row" data-total="{{ $previousTotal }}">
                                    <th colspan="4">Total:</th>
                                    <td colspan="3">{{ $previousTotal }}</td>
                                </tr>
                            @endif

  </tbody>
               </table>
               </div>
               <div class="mt-4">
                    <h4>Period Total: <span id="period-total"></span></h4>
                </div>
</div>
      </div>     
            </div>
</div>


          
    <!-- container-scroller -->
    @include('admin.script')

    </div>
  </body>
</html>