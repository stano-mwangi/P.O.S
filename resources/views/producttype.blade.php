@include('navstore')

<!-- Toggle button for sidebar (visible on smaller screens) -->
<button class="btn toggle-sidebar-btn d-lg-none" data-bs-toggle="collapse" data-bs-target="#sidebar">
    <i class="fas fa-bars"></i> sidebar
</button>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar (collapsible for mobile screens) -->
        <nav id="sidebar" class="col-lg-3 collapse d-lg-block sidebar">
            <h3>Product Type Manager</h3>
            <ul class="list-unstyled">
    <li><a href="#"><i class="fas fa-plus-circle text-success"></i> New Product Type</a></li>
    <li><a href="#">BAR SOAP</a></li>
    <li><a href="#">BATHING SOAP</a></li>
    <li><a href="#">BISCUITS</a></li>
    <li><a href="#">BLEACH</a></li>
    <li><a href="#">BODY SPRAY</a></li>
    <li><a href="#">BUTTER</a></li>
    <li><a href="#">CAKE</a></li>
    <li><a href="#">COCONUT OIL</a></li>
    <li><a href="#">CHEESE</a></li>
    <li><a href="#">CEREAL</a></li>
    <li><a href="#">CHOCOLATE</a></li>
    <li><a href="#">COFFEE</a></li>
    <li><a href="#">CREAM</a></li>
    <li><a href="#">DETERGENT</a></li>
    <li><a href="#">EGGS</a></li>
</ul>

        </nav>

        <!-- Main content area -->
        <main class="col main-content">
            <div class="custom-form-container">
                <div class="custom-header">
                    Product Type Data Form
                </div>
                <form>
                    <div class="form-group">
                        <label for="product-type">Name:</label>
                        <input type="text" class="form-control" id="product-type" placeholder="Product Type Name">
                    </div>
                    <div class="form-group ">
                <label for="supplier">Department:</label>
                <select class="form-control" id="supplier">
                    <option selected>No Department Selected</option>
                    <option>Department 1</option>
                    <option>Department 2</option>
                    <option>Department 3</option>
                </select>
            </div>
            <div class="form-group">
                        <label for="brand-description">Description:</label>
                        <input type="text" class="form-control" id="brand-description" placeholder="Brand Description">
                    </div>
                    <button type="submit" class="btn btn-custom mt-3">Save</button>
                </form>
            </div>
        </main>
    </div>
</div>



</body>
</html>
