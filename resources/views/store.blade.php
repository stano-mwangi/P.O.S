@include('navstore')

<div class="container custom-container">
    <!-- Inventory Receiving Main Section -->
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="custom-section">
                <h3 class="custom-title"><i class="fas fa-box custom-icon"></i> Activities</h3>

                <!-- Receiving items section -->
                <div class="mb-3">
                    <h5>Receiving Items</h5>
                    <a href="{{url('newinventory')}}" class="custom-link">Inventory(items) Receiving</a>
                    <a href="#" class="custom-link">Convert Purchases Order</a>
                </div>

                <!-- Confirm Receiving Vouchers section -->
                <div class="mb-3">
                    <h5>Confirm Receiving Vouchers</h5>
                    <a href="#" class="custom-link">Confirm Receiving Vouchers</a>
                </div>

                <!-- Receiving Reports section -->
                <div class="mb-3">
                    <h5>Receiving Reports</h5>
                    <a href="#" class="custom-link">Receiving Reports</a>
                </div>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="col-lg-3 col-md-12">
            <!-- Receiving Vouchers Section -->
            <div class="custom-section">
                <h5 class="custom-title"><i class="fas fa-receipt custom-icon"></i> Receiving Vouchers</h5>
                <a href="#" class="custom-link">View Receiving Vouchers</a>
            </div>

            <!-- Reports Section -->
            <div class="custom-section">
                <h5 class="custom-title"><i class="fas fa-chart-bar custom-icon"></i> Reports</h5>
                <a href="#" class="custom-link">Item Receiving Reports</a>
            </div>

            <!-- Analysis Section -->
            <div class="custom-section">
                <h5 class="custom-title"><i class="fas fa-chart-pie custom-icon"></i> Analysis</h5>
                <a href="#" class="custom-link">Pending Receiving</a>
                <a href="#" class="custom-link">Purchases Analytics</a>
            </div>
        </div>
    </div>
</div>


@include('footer')
</body>
</html>
