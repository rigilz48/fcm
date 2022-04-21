<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('page-head'); ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<style>
    .table > tbody > tr > td {
        vertical-align: middle;
     }
</style>

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                    <a href="<?= base_url('admin/blog/add'); ?>" class="bg-primary color-palette btn btn-sm"><i class="fas fa-plus"></i> Tambah Blog</a>
                </div>
              </div>
              <?= csrf_field() ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tbl_blog" class="table table-sm table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <?= $this->endSection(); ?>

<?= $this->section('page-modal') ?>

<!-- Modal Delete Blog-->
<div class="modal fade" id="confirm-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Blog</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('page-script'); ?>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Page specific script -->

<script>
  $(function () {
    if ($("#tbl_blog").length > 0) {
      $("#tbl_blog").DataTable({
          "processing": true,
          "serverSide": true,
          "order": [[3, 'desc']],
          "ajax" : "<?= site_url('admin/blog/blog_json') ?>",
          columns: [
              {data: 'blog_img', name: 'title_blog'},
              {data: 'title_blog', name: 'title_blog'},
              {data: 'status', name: 'status'},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action', sortable: false, className: 'text-center'},
            ],
            dom: 'Bfrtip',
            "columnDefs": [
                {"targets": [0],"render": function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {"targets": [1],"render": function (data, type, row, meta) {
                  return `<a href="blog/view/${row.id_blog}" title="Ubah ${row.title_blog}">${row.title_blog}</a>`;
                }},
                {"targets": [2], "render": function(data, type, row, meta) {
                  if(data == 1) {
                    return `Publish`;
                  } else {
                    return `Draft`;
                  }
                }},
                {"targets": [3], "render": function(data, type, row, meta) {
                  return moment(data).format('DD-MM-YYYY');
                }}
            ],
            "responsive": true, "lengthChange": false, "autoWidth": false,
      });
    }
  });

  function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>

<?= $this->endSection(); ?>