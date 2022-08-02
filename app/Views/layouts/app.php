<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?> Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.css">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="<?= base_url() ?>/dist/snackbar.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- jQuery -->
  <script src="<?= base_url() ?>/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>/plugins/jquery-validation/additional-methods.min.js"></script>
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
  <?php $data['page'] = 'home' ?>

  <?= $this->include('layouts/nav', $data) ;?>

  <?= $this->include('layouts/sidebar') ;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $this->renderSection('page-header') ?>

    <?= $this->renderSection('content') ?>

    <!-- <div class="input-group date datepickers" id="ass_date" data-target-input="nearest">
      <label for="assessment_date" class="col-md-4 col-form-label arterix">Assessment Date</label>
      <input id="assessment_date" name="assessment_date" type="text" data-target="#ass_date" data-toggle="datetimepicker" 
            class="form-control col-md-6 datetimepicker-input assessment-date-keypress" data-target="#ass_date" 
            autocomplete="off" required>
    </div>

    
    <div class="form-group">
      <label>Tanggal Pinjam:</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" value="" class="form-control datetimepicker-input" data-target="#reservationdate"/>
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div> -->

    <div class="modals"></div>

    <?= $this->renderSection('modal') ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer
  <footer class="main-footer">
    To the right
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    Default to the left
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>

<script src="<?= base_url() ?>/dist/snackbar.min.js"></script>
<script src="<?= base_url() ?>/dist/init.js"></script>

<script>
  $('body').on('shown.bs.modal', '.modal', function() {
    $(this).find('select').each(function() {
      var dropdownParent = $(document.body);
      if ($(this).parents('.modal.in:first').length !== 0)
        dropdownParent = $(this).parents('.modal.in:first');
      $(this).select2({
        dropdownParent: dropdownParent
        // ...
      });
    });
  });

  $("body").delegate(".datepickers", "focusin", function () {
      $(this).datetimepicker({
        format: 'YYYY-MM-DD'
      });
  });

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });

</script>

<?= $this->include('_partials/js/session') ;?>

<?= $this->include('_partials/ajaxPromise') ;?>

<?= $this->renderSection('js') ?>

<script>
  function formPeminjamValidate() {
    $("#form-peminjam").validate({
      rules: {
        peminjam: {
          required: true,
        },
        buku: {
          required: true,
        },
        tgl_pinjam: {
          required: true,
        },
      },
      messages: {
        peminjam: {
          required: 'Peminjam wajib diisi',
        },
        buku: {
          required: 'Buku wajib diisi',
        },
        tgl_pinjam: {
          required: 'Tanggal Pinjam wajib diisi',
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      submitHandler: async function(form) {
        $('#send_form').html('Sending...');
        var method = $('#method').text()
        var peminjam_id = $('#peminjam_id').val()
        if (method == 'POST') {
          var url = '<?= base_url() . route_to('create-peminjam') ?>'
        } else if (method == 'PUT') {
          var url = `<?= base_url() ?>/peminjam/${peminjam_id}`
        }
        var data = $('#form-peminjam').serialize()
        const response = await HitData(url, data, 'POST')
        var success = response.success
        console.log(response)
        if (success) {
          $('#send_form').html('Submit');
          successNotif(response.msg)
          document.getElementById("form-peminjam").reset(); 
          <?php
            if (in_groups('admin')) {
              ?>
                getPeminjam()
              <?php
            }
          ?>
          $('#modalPeminjam').modal('hide')
        } else {
          errorNotif(response.msg)
        }
      }
    });
  }
    
  async function getPeminjam() {
    try {
      var sectionData = $('#load-peminjam')
      url = '<?= base_url() ?>/peminjam'
      const response = await HitData(url, null, "GET");
      sectionData.html(response)
      
      $("#peminjam-table").DataTable({
        'pageLength': 10,
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#peminjam-table-wrapper');
    } catch (error) {
        errorNotif('Error ' . error)
    }
  }
  
  async function newPeminjam() {
    try {
      var sectionModal = $('.modals')
      sectionModal.html('')
      url = '<?= base_url() . route_to('new-peminjam') ?>'
      const response = await HitData(url, null, 'GET')
      var modalResponse = sectionModal.html(response).find('#modalPeminjam');
      modalResponse.modal('show')
      formPeminjamValidate()
    } catch (error) {
      errorNotif('Error ' . error)
    }
  }
</script>
</body>
</html>
