 </main>
 <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end small">
            <div class="text-muted">Copyright &copy; ADM PUTRA TABIR <?php echo date("Y") ?></div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/jquery-ui/jquery-ui.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/Chart.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/datatables-demo.js') ?>"></script>

<!-- Bootstrap Date Range Picker -->
<script src="<?php echo base_url('vendors/moment/min/moment.min.js') ?>"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?php echo base_url('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/sendiri.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#example4').dataTable({
            "language": {
                "lengthMenu": 'Tampilkan <select>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    // '<option value="5">5</option>' +
                    '<option value="-1">All</option>' +
                    '</select> Data'
            },
            "responsive": true,
            "autoWidth": false,
            // "sPaginationType": "full_numbers",
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\Rp.]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };

                // total_salary over all pages
                total_salary = api.column(5).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // total_page_salary over this page
                total_page_salary = api.column(5, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var rupiah = total_page_salary = parseFloat(total_page_salary);
                total_salary = parseFloat(total_salary);
                // Update footer
                $('#total_order1').html('Rp ' + total_page_salary.toLocaleString('id', {
                    currency: 'IDR'
                }));

                // total_salary over all pages
                total_salary = api.column(6).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // total_page_salary over this page
                total_page_salary = api.column(6, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var rupiah = total_page_salary = parseFloat(total_page_salary);
                total_salary = parseFloat(total_salary);
                // Update footer
                $('#total_order2').html(total_page_salary.toLocaleString('id', {
                    currency: 'IDR'
                }));

                // total_salary over all pages
                total_salary = api.column(7).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // total_page_salary over this page
                total_page_salary = api.column(7, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var rupiah = total_page_salary = parseFloat(total_page_salary);
                total_salary = parseFloat(total_salary);
                // Update footer
                $('#total_order3').html('Rp ' + total_page_salary.toLocaleString('id', {
                    currency: 'IDR'
                }));
            },
        });
    });
</script>
</script>
</body>
</html>
