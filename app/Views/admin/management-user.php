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
                    <a href="#" class="bg-primary color-palette btn btn-sm btn-add-user"><i class="fas fa-plus"></i> Tambah User</a>
                </div>
              </div>
              <?= csrf_field() ?>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="height: auto;">
                <!-- <?php if (isset($validation)) { ?>  
                <?php foreach ($validation->getErrors() as $error) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= esc($error) ?>
                </div>
                <?php endforeach ?>
                <?php } ?> -->
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php elseif(session()->getFlashdata('danger')) : ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= session()->getFlashdata('danger') ?>
                <?php endif; ?>
                <table id="tbl_user" class="table table-sm table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Grup</th>
                    <th>Aktif</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($users as $rw) {
                          $row = "row".$rw->id;
                          echo $$row;
                      }
                      ?>
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
<form action="<?= base_url('admin/managementuser/adduser'); ?>" method="post">
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= csrf_field(); ?>
          <input type="hidden" name="id" class="id">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="<?=lang('Auth.username')?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="<?=lang('Auth.email')?>">
        </div>
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control password" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Ulangi Password</label>
            <input type="password" class="form-control pass_confirm" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
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

<!-- Modal Change Activated-->
<form action="<?= base_url('admin/managementuser/activate'); ?>" method="post">
<div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Aktif User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Pilih "Ya" untuk mengupdate User</p>
      </div>
      <div class="modal-footer justify-content-between">
          <?= csrf_field(); ?>
          <input type="hidden" name="id" class="id">
          <input type="hidden" name="active" class="active">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</form>

<!-- Modal Change Password-->
<form action="<?= base_url('admin/managementuser/changepassword'); ?>" method="post">
<div class="modal fade" id="ChangePWModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= csrf_field(); ?>
          <input type="hidden" name="id" class="id">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control username1" id="username1" disabled="disabled">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control password" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="pass_confirm">Ulangi Password</label>
            <input type="password" class="form-control pass_confirm" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
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

<!-- Modal Change Grup-->
<form action="<?= base_url('admin/managementuser/changegroup'); ?>" method="post">
<div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Grup</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= csrf_field(); ?>
          <input type="hidden" name="id" class="id">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control username2" id="username2" disabled="disabled">
        </div>
        <div class="form-group">
            <label for="group">Grup</label>
            <select class="form-control" name="group" style="width: 100%;" data-toggle="select">
            <?php foreach($groups as $key => $row){ ?>
            <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
            <?php } ?>
            </select>
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
<!-- <form action="<?= base_url('admin/managementuser/deleteuser'); ?>" method="post">
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Aktif User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Pilih "Ya" untuk Menghapus User <input type="text" class="form-control username3" id="username3" disabled="disabled"></p>
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
</form> -->

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
        if ($("#tbl_user").length > 0) {
            $("#tbl_user").DataTable({
              "order": [[0, 'desc']],
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        // get Active User
        $('.btn-active-users').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const active = $(this).data('active');
             
            // Set data to Form Edit
            $('.id').val(id);
            $('.active').val(active);
            // Call Modal Edit
            $('#activateModal').modal('show');
        });
        
        // get Change Password User
        $('.btn-change-pw').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const username = $(this).data('username1');
             
            // Set data to Form Edit
            $('.id').val(id);
            $('.username1').val(username);
            // Call Modal Edit
            $('#ChangePWModal').modal('show');
        });

        $('.btn-change-group').on('click',function(){
            const id = $(this).data('id');
            const username = $(this).data('username2');
            
            $('.id').val(id);
            $('.username2').val(username);

            $('#changeGroupModal').modal('show');
        });

        // $('.btn-delete-user').on('click',function(){
        //     const id = $(this).data('id');
        //     const username = $(this).data('username3');
            
        //     $('.id').val(id);
        //     $('.username3').val(username);

        //     $('#deleteUserModal').modal('show');
        // });

        $('.btn-add-user').on('click',function(){
            $('#addUserModal').modal('show');
        });
        
 
    });
</script>

<?= $this->endSection(); ?>