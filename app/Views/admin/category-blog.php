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
                    <a href="#" class="bg-primary color-palette btn btn-sm btn-add-category"><i class="fas fa-plus"></i> Tambah Kategori</a>
                </div>
              </div>
              <?= csrf_field() ?>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="height: auto;">
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
                <table id="tbl_category" class="table table-sm table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                    <th width="50">#</th>
                    <th>Kategori</th>
                    <th>Slug</th>
                    <th width="200">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($blogcategory as $category) : ?>
                    <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <td><?= $category['name_category']; ?></td>
                      <td><?= $category['slug_category']; ?></td>
                      <td><a href="#" class="btn btn-sm btn-warning btn-circle btn-change-category" data-id="<?= $category['id_category']; ?>" data-name="<?= $category['name_category']; ?>" title="Ubah Kategori" ><i class="fas fa-edit"></i></a> <a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-category" data-id="<?= $category['id_category']; ?>" data-name2="<?= $category['name_category']; ?>" title="Hapus Kategori"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
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

<!-- Modal Add User-->
<form action="<?= base_url('admin/categoryblog/addcategory'); ?>" method="post">
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= csrf_field(); ?>
        <div class="form-group">
            <label for="name_category">Nama Kategori</label>
            <input type="text" class="form-control" name="name_category" placeholder="Nama Kategori">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</form>

<!-- Modal Change Category-->
<form action="<?= base_url('admin/categoryblog/changecategory'); ?>" method="post">
<div class="modal fade" id="ChangeCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= csrf_field(); ?>
          <input type="hidden" name="id" class="id">
        <div class="form-group">
            <label for="username">Nama Kategori</label>
            <input type="text" class="form-control name" id="name" name="name">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</form>

<!-- Modal Delete User-->
<form action="<?= base_url('admin/categoryblog/deletecategory'); ?>" method="post">
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Pilih "Ya" untuk Menghapus Kategori <input type="text" class="form-control name2" id="name2" name="name2" disabled="disabled"></p>
      </div>
      <div class="modal-footer justify-content-between">
          <?= csrf_field(); ?>
          <input type="hidden" name="id" class="id">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
</form>

<?= $this->endSection(); ?>

<?= $this->section('page-script'); ?>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Page specific script -->
<script>
    $(function () {
        if ($("#tbl_category").length > 0) {
            $("#tbl_category").DataTable({
              
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

      $('.btn-add-category').on('click',function(){
            $('#addCategoryModal').modal('show');
        });
        
        $('.btn-change-category').on('click',function(){
            const id = $(this).data('id');
            const name = $(this).data('name');
             
            $('.id').val(id);
            $('.name').val(name);

            $('#ChangeCategoryModal').modal('show');
        });

        $('.btn-delete-category').on('click',function(){
            const id = $(this).data('id');
            const name2 = $(this).data('name2');
            
            $('.id').val(id);
            $('.name2').val(name2);

            $('#deleteCategoryModal').modal('show');
        });
 
    });
</script>

<?= $this->endSection(); ?>