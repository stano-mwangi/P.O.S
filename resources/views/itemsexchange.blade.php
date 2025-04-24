@include('navstore')
<div class="container my-5">
    <!-- Setup Items Exchange Form -->
    <div class="custom-form-container">
        <!-- Header Section -->
        <div class="custom-header">
            Setup Items Exchange
        </div>

        <!-- Form Section -->
        <form>
            <!-- Customer Field -->
            <div class="form-group mt-4">
                <label for="customer">Customer:</label>
                <select class="form-control" id="customer">
                    <option selected>No Branch selected</option>
                    <option>Branch 1</option>
                    <option>Branch 2</option>
                    <option>Branch 3</option>
                </select>
            </div>

            <!-- Receive Branch Field -->
            <div class="form-group">
                <label for="receive-branch">Receive Branch (Others):</label>
                <select class="form-control" id="receive-branch">
                    <option selected>No Branch Selected</option>
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
