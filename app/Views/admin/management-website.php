<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('page-head'); ?>

<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

    <!-- Main content -->
    <section class="content">
        <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>
      <div class="row">
        <div class="col-md-8">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?= base_url('admin/blog'); ?>" class="bg-primary color-palette btn btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <?php foreach($website as $web) : ?>
            <form action="<?= base_url('admin/managementwebsite/updatewebsite'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_website" value="<?= $web['id_website']; ?>">
                <input type="hidden" name="oldFile" value="<?= $web['img_website']; ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Website</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_website" placeholder="Nama Website" value="<?= $web['name_website']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Website</label>
                        <div class="col-sm-9">
                            <textarea name="description_website" style="width:100%; height: 300px"><?= $web['description_website']; ?></textarea>
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-outline card-primary">
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email Website</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" name="email_website" placeholder="Email Website" value="<?= $web['email_website']; ?>">
                </div>
              </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-9 custom-file">
                        <input type="file" class="form-control custom-file-input" name="image_file" id="customFile" onchange="preview()" accept=".jpg,.png,.jpeg,.gif">
                        <label class="custom-file-label" for="customFile">
                            <?php if ($web['img_website'] == NULL): ?>
                              Pilih Logo Website
                              <?php else: ?>
                              <?= $web['img_website']; ?>
                              <?php endif; ?>
                        </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <img id="frame" src="<?= base_url('assets/img/'.$web['img_website'].''); ?>" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

  <?= $this->endSection(); ?>

<?= $this->section('page-script'); ?>

<!-- TinyMCE -->
<script src="<?= base_url() ?>/plugins/tiny_mce/tiny_mce.js"></script>

<!-- Select2 -->
<script src="<?= base_url(); ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
tinyMCE.init({
    theme : "advanced",
    mode : "textareas",
    external_image_list_url : "ext_image_list.php"
});

function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
}

$(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});

$(function () {
  bsCustomFileInput.init();
});
</script>

<?= $this->endSection(); ?>