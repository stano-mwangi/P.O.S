@include('navstore')

<!-- Toggle button for sidebar (visible on smaller screens) -->
<button class="btn toggle-sidebar-btn d-lg-none" data-bs-toggle="collapse" data-bs-target="#sidebar">
    <i class="fas fa-bars"></i> sidebar
</button>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar (collapsible for mobile screens) -->
        <nav id="sidebar" class="col-lg-3 collapse d-lg-block sidebar">
            <h3>Product Data Form</h3>
            <ul class="list-unstyled">
    <li><a href="#"><i class="fas fa-plus-circle text-success"></i> New Feature</a></li>
   
</ul>

        </nav>

        <!-- Main content area -->
        <main class="col main-content">
            <div class="custom-form-container">
                <div class="custom-header">
                    Product Data Form
                </div>
                <form>
                <div class="form-group">
                        <label for="product-name">Name:</label>
                        <input type="text" class="form-control" id="product-name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="product-description">Description:</label>
                        <input type="text" class="form-control" id="product-description" placeholder="Product Description">
                    </div>
                    <div class="form-group">
                        <label for="upc">UPC:</label>
                        <input type="text" class="form-control" id="upc" placeholder="UPC">
                    </div>
                    <div class="form-group">
                        <label for="upc2">UPC2:</label>
                        <input type="text" class="form-control" id="upc2" placeholder="UPC2">
                    </div>
                    <div class="form-group">
                        <label for="alternative-lookup">Alternative Lookup:</label>
                        <input type="text" class="form-control" id="alternative-lookup" placeholder="Alternative Lookup">
                    </div>
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" class="form-control" id="model" placeholder="Model">
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <input type="text" class="form-control" id="size" placeholder="Size">
                    </div>
                    <div class="form-group">
                        <label for="attribute">Attribute:</label>
                        <input type="text" class="form-control" id="attribute" placeholder="Attribute">
                    </div>
                   
                    <button type="submit" class="btn btn-custom mt-3">Save</button>
                </form>
            </div>
        </main>
    </div>
</div>



</body>
</html>
