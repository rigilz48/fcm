
<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('page-head'); ?>

<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

    <?php foreach ($blog as $blog) : ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?= base_url('admin/blog'); ?>" class="bg-primary color-palette btn btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <form action="#" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Blog</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul Blog" value="<?= $blog['title_blog']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">isi Blog</label>
                        <div class="col-sm-9">
                            <textarea name="description" style="width:100%; height: 300px" disabled><?= $blog['description']; ?></textarea>
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-outline card-primary">
            <div class="card-body">
                <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status" disabled>
                                <?php if ($blog['status'] == 1): ?>
                                <option value="1" selected="selected">Publish</option>
                                <option value="0">Draft</option>
                                <?php elseif ($blog['status'] == 0): ?>
                                <option value="0" selected="selected">Draft</option>
                                <option value="1">Publish</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?= $blog['updated_at']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-control select2bs4" name="category" style="width: 100%;"  disabled>
                                <option value="<?= $blog['category_id']; ?>" selected="selected"><?= $blog['name_category']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-9 custom-file">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <img id="frame" src="<?= base_url('assets/img/blog/'.$blog['blog_img'].''); ?>" class="img-fluid rounded" />
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <?php endforeach ?>

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