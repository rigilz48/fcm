<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('page-head'); ?>

<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

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
            <form action="<?= base_url('admin/blog/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" class="form-control" name="user_id" value="<?= user()->id; ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Blog</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul Blog">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">isi Blog</label>
                        <div class="col-sm-9">
                            <textarea name="description" style="width:100%; height: 300px"></textarea>
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
                            <select class="form-control" name="status">
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-control select2bs4" name="category" style="width: 100%;">
                                <?php foreach ($blogcategory as $category) : ?>
                                <option value="<?= $category['id_category']; ?>"><?= $category['name_category']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-9 custom-file">
                            <input type="file" class="form-control custom-file-input" name="image_file" id="customFile" onchange="preview()" accept=".jpg,.png,.jpeg,.gif">
                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <img id="frame" src="" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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