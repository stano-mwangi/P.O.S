@include('navstore')
<div class="container my-5">
    <!-- Header -->
    <div class="custom-header">
        View Exchanged Items
    </div>

    <!-- Form Section -->
    <div class="custom-form-container">
        <form class="row">
            <!-- Branch (Others) Selection -->
            <div class="col-md-4 form-group">
                <label for="branchOthers">Branch (Others)</label>
                <select id="branchOthers" class="form-control">
                    <option selected>No Branch selected</option>
                    <option value="1">Branch 1</option>
                    <option value="2">Branch 2</option>
                    <option value="3">Branch 3</option>
                </select>
            </div>

            <!-- Start Date -->
            <div class="col-md-4 form-group">
                <label for="startDate">Start Date</label>
                <input type="date" class="form-control" id="startDate">
            </div>

            <!-- End Date -->
            <div class="col-md-4 form-group">
                <label for="endDate">End Date</label>
                <input type="date" class="form-control" id="endDate">
            </div>

            <!-- Search Button -->
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-custom mt-3">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="custom-table-container">
        <div class="row mb-2">
            <div class="col-md-6">
                <strong>Branch: </strong><span id="branchDisplay">No Branch selected</span>
            </div>
            <div class="col-md-6 text-right">
                <strong>Date: </strong><span id="dateDisplay">Not selected</span>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Transaction ID</th>
                        <th>Return Branch</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center">No Data Available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('footer')
</body>
</html>
