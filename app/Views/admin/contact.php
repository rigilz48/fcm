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

<?= csrf_meta() ?>

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="height: auto;">
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
                <table id="tbl_contact" class="table table-sm table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                    <th width="50">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th width="200">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($contact as $contact) : ?>
                    <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <td><?= $contact['name_contact']; ?></td>
                      <td><?= $contact['email_contact']; ?></td>
                      <td><button class="btn btn-sm btn-success btn-circle viewcontact" data-id="<?= $contact['id_contact']; ?>" data-name="<?= $contact['name_contact']; ?>" data-email="<?= $contact['email_contact']; ?>" data-subject="<?= $contact['subject_contact']; ?>" data-message="<?= $contact['message_contact']; ?>" title="Lihat Pesan Kontak" ><i class="far fa-eye"></i></button> <a href="#" class="btn btn-sm btn-danger btn-circle deletecontact" data-id="<?= $contact['id_contact']; ?>" data-name="<?= $contact['name_contact']; ?>" data-email="<?= $contact['email_contact']; ?>" title="Hapus Pesan Kontak"><i class="fas fa-trash"></i></a></td>
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

<!-- Modal View Contact-->
<div class="modal fade" id="view-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field(); ?>
                <input type="hidden" id="id" class="id">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="name" disabled="disabled">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" disabled="disabled">
                </div>
                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" class="form-control" id="subject" disabled="disabled">
                </div>
                <div class="form-group">
                    <label>Subjek</label>
                    <textarea style="width:100%; height: 100px" id="message" disabled="disabled"></textarea>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Contact-->
<form action="<?= base_url('admin/contact/deletecontact'); ?>" method="post">
<div class="modal fade" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field(); ?>
                <input type="hidden" id="id" name="id" class="id">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control name" disabled="disabled">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control email" disabled="disabled">
                </div>
                <p>Pilih "Ya" untuk Menghapus Kontak Pesan</p>
            </div>
            <div class="modal-footer justify-content-between">
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
        if ($("#tbl_contact").length > 0) {
            $("#tbl_contact").DataTable({
              
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.viewcontact').on('click',function(){
            const id = $(this).data('id');
            const name = $(this).data('name');
            const email = $(this).data('email');
            const subject = $(this).data('subject');
            const message = $(this).data('message');
            
            $('#id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#subject').val(subject);
            $('#message').val(message);

            $('#view-modal').modal('show');
            $('.modal-title').text('Lihat kontak pesan');
        });

        $('.deletecontact').on('click',function(){
            const id = $(this).data('id');
            const name = $(this).data('name');
            const email = $(this).data('email');
            
            $('.id').val(id);
            $('.name').val(name);
            $('.email').val(email);

            $('#delete-modal').modal('show');
            $('.modal-title').text('Hapus kontak pesan');
        });
    });
</script>

<?= $this->endSection(); ?>