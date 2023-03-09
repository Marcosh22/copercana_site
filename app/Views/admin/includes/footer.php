  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="<?= base_url('_assets/admin/vendor/apexcharts/apexcharts.min.j'); ?>s"></script>
  <script src="<?= base_url('_assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/chart.js/chart.min.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/echarts/echarts.min.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/quill/quill.min.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/DataTables/datatables.min.js'); ?>"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('_assets/admin/vendor/tinymce/tinymce.min.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/php-email-form/validate.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/ckeditor/ckeditor.js'); ?>"></script>
  <script src="<?= base_url('_assets/admin/vendor/sortable/sortable.min.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('_assets/admin/js/main.js'); ?>"></script>

  <?php if(isset($footer_dependencies)) {
    foreach($footer_dependencies as $dependency) {
        echo $dependency;
        }   
    }  ?>

</body>

</html>
