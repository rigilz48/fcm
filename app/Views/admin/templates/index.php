<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Foodcast Cerita Makanan - Admin - <?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
  <?= $this->renderSection('page-head'); ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?= $this->include('admin/templates/navbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?= $this->include('admin/templates/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <?= $breadcrumbs; ?>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?= $this->renderSection('page-content'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?= $this->renderSection('page-modal'); ?>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>CI Version</b> <?= \CodeIgniter\CodeIgniter::CI_VERSION; ?>
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?></strong> Foodcast Cerita Makanan.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>/dist/js/demo.js"></script>

<script>
  /** add active class and stay opened when selected */
  var url = window.location;

  var path = location.pathname.split('/')
  var url2 = location.origin + '/' + path[1] + '/' + path[2]
  
  // for sidebar menu entirely but not cover treeview
  $('ul.nav-sidebar a').filter(function() {
    return this.href == url;
  }).addClass('active');

  $('ul.nav-sidebar a').filter(function() {
      return this.href == url2;
  }).addClass('active');

  // for treeview
  $('ul.nav-treeview a').filter(function() {
      return this.href == url;
  }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<?= $this->renderSection('page-script'); ?>

</body>
</html>
