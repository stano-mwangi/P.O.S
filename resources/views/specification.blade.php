@include('navstore')
<div class="container my-5">
    <!-- Setup Items Exchange Form -->
    <div class="custom-form-container">
        <!-- Header Section -->
        <div class="custom-header">
            Setup Product Specification
        </div>

        <!-- Form Section -->
        <form>
            <!-- Customer Field -->
            <div class="form-group mt-4">
                <label for="customer">Store/Branch(Others):</label>
                <select class="form-control" id="customer">
                    <option selected>Select product</option>
                    <option>Product 1</option>
                    <option>Product 2</option>
                    <option>Product 3</option>
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
