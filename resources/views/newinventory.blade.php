@include('navstore')
<div class="container my-5">
    <!-- Setup Items Exchange Form -->
    <div class="custom-form-container">
        <!-- Header Section -->
        <div class="custom-header">
            Setup Receiving New Inventory
        </div>

        <!-- Form Section -->
        <form>
            <!-- Customer Field -->
            <div class="form-group mt-4">
                <label for="supplier">Vendor (others):</label>
                <select class="form-control" id="supplier">
                    <option selected>Select vendor/supplier</option>
                    <option>Supplier 1</option>
                    <option>Supplier 2</option>
                    <option>Supplier 3</option>
                </select>
            </div>

            <!-- Receive Branch Field -->
            <div class="form-group">
                <label for="receive-branch">Receive Branch (Others):</label>
                <select class="form-control" id="receive-branch">
                    <option selected>Select Receiving Branch/Store (Others)</option>
                    <option>Branch A</option>
                    <option>Branch B</option>
                    <option>Branch C</option>
                </select>
            </div>

            <!-- Product Type Field -->
            <div class="form-group">
                <label for="product-type">Product Type:</label>
                <select class="form-control" id="product-type">
                    <option selected>All product types</option>
                    <option>Type 1</option>
                    <option>Type 2</option>
                    <option>Type 3</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-custom mt-3">Proceed</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->

@include('footer')

</body>
</html>
