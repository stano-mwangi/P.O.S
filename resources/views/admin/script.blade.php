<!-- plugins:js -->
<script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollContainer = document.getElementById('scroll-container');
            let isDown = false;
            let startX, startY, scrollLeft, scrollTop;

            scrollContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - scrollContainer.offsetLeft;
                startY = e.pageY - scrollContainer.offsetTop;
                scrollLeft = scrollContainer.scrollLeft;
                scrollTop = scrollContainer.scrollTop;
                scrollContainer.style.cursor = 'grabbing';
            });

            scrollContainer.addEventListener('mouseleave', () => {
                isDown = false;
                scrollContainer.style.cursor = 'grab';
            });

            scrollContainer.addEventListener('mouseup', () => {
                isDown = false;
                scrollContainer.style.cursor = 'grab';
            });

            scrollContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - scrollContainer.offsetLeft;
                const y = e.pageY - scrollContainer.offsetTop;
                const walkX = (x - startX) * 2; // Scroll-fast
                const walkY = (y - startY) * 2; // Scroll-fast
                scrollContainer.scrollLeft = scrollLeft - walkX;
                scrollContainer.scrollTop = scrollTop - walkY;
            });

            // Calculate period total
            let periodTotal = 0;
            const totalRows = document.querySelectorAll('.total-row');
            totalRows.forEach(row => {
                periodTotal += parseFloat(row.getAttribute('data-total'));
            });
            document.getElementById('period-total').textContent = periodTotal.toFixed(2);
        });

        $('#clearAll').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ url("/clearAllproducts") }}',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
    </script>
