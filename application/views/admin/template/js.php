
<!-- Optional JavaScript -->
<script src="<?php echo base_url('assets/admin/node_modules/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/moment/moment.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="<?php echo base_url('assets/admin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js');?>"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="<?php echo base_url('assets/admin/node_modules/masonry-layout/dist/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/sweetalert2/dist/sweetalert2.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/chart.js/dist/Chart.min.js');?>"></script>

<script src="<?php echo base_url('assets/admin/node_modules/amcharts3/amcharts/amcharts.js');?>"></script>
<script src="<?php echo base_url('assets/admin/node_modules/amcharts3/amcharts/gauge.js');?>"></script>


<?php for($i=0;$i< count($additional_js);$i++):?>
    <script src="<?php echo base_url().$additional_js[$i];?>"></script>
<?php endfor?>
<script src="<?php echo base_url('assets/admin/js/custom/charts/dashboard-default.js');?>"></script>
<!-- Custom JavaScript -->
<script src="<?php echo base_url('assets/admin/js/script.js');?>"></script>
