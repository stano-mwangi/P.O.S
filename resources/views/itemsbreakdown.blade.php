@include('navstore')
<div class="container my-5">
    <!-- Setup Items Exchange Form -->
    <div class="custom-form-container">
        <!-- Header Section -->
        <div class="custom-header">
            Setup Item Breakdown
        </div>

        <!-- Form Section -->
        <form>
            <!-- Customer Field -->
            <div class="form-group mt-4">
                <label for="customer">Store/Branch(Others):</label>
                <select class="form-control" id="customer">
                    <option selected>No Branch selected</option>
                    <option>Branch 1</option>
                    <option>Branch 2</option>
                    <option>Branch 3</option>
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

            <!-- Price level field -->
            <div class="form-group">
                <label for="price-level">Price level:</label>
                <select class="form-control" id="price-level">
                    <option selected>All Price levels</option>
                    <option>Price level  A</option>
                    <option>Price level B</option>
                    <option>Price level C</option>
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
