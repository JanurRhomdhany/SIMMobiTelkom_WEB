<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
<!--     <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
<!--     <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

    <script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
    <!-- <script src="<?php echo base_url()?>assets/js/demo/datatables-demo.js"></script> -->

<!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>




<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->

<script>
    
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>


<script>
$(document).ready(function() {
    var userSessionName = $("#userSessionName").val();
    var pdfTitle = 'Laporan Penggunaan Mobil SIM Mobi Telkom';
    var date = 'Tanggal Cetak: ' + new Date().toLocaleDateString();
    var time = 'Jam Cetak: ' + new Date().toLocaleTimeString();

    $('#tabelLaporan').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print',
                exportOptions: {
                    stripHtml: false,
                    columns: ':not(.no-export)'
                },
                customize: function(win) {
                    // Custom CSS for aligning left
                    var customCSS = '<style>h2, p { text-align: left; }</style>';
                    $(win.document.head).append(customCSS);

                    // PDF content with aligned left date, time, and title
                    var title = '<h2>' + pdfTitle + '</h2>';
                    var user = '<p>User: ' + userSessionName + '</p>';
                    var dateElement = '<p>' + date + '</p>';
                    var timeElement = '<p>' + time + '</p>';

                    $(win.document.body).find('h1').remove(); // Remove the default DataTables header
                    // Add the content above the table in the document
                    $(win.document.body).prepend(user, dateElement, timeElement, title);

                    // Fit the table content
                    
                }
            }
        ]
    });
});







</script>

<script>
    
    $('#pengembalianTable').DataTable({
            // Your DataTables configuration options for #pengembalianTable
        });

        // Click event handler for the image cells
        $('#pengembalianTable').on('click', 'td[data-imgurls]', function() {
            var imgUrls = $(this).data('imgurls').split(',');
            var carouselInner = $('.carousel-inner');
            carouselInner.empty();

            imgUrls.forEach(function(imgUrl, index) {
                var carouselItem = $('<div class="carousel-item">');
                if (index === 0) {
                    carouselItem.addClass('active');
                }
                carouselItem.append('<img src="' + imgUrl.trim() + '" class="d-block w-100" alt="Bukti Kondisi Mobil">');
                carouselInner.append(carouselItem);
            });

            $('#imageModal').modal('show');

            // Initialize the carousel after updating the content
            $('.carousel').carousel();
        });
</script>


</body>

</html>