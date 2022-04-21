<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('page-head'); ?>



<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('dist/img/'.user()->user_image.''); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= user()->fullname; ?></h3>

                <p class="text-muted text-center text-uppercase"><?= $group[0]['name']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Post Blog</b> <a class="float-right">
                        <?php foreach($blog as $row): $total = $row['total']; ?>
                        <?= htmlentities($total , ENT_QUOTES, 'UTF-8') ?>
                        <?php endforeach; ?>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?= session()->getFlashdata('success') ?>
            </div>
            <?php elseif(session()->getFlashdata('danger')) : ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?= session()->getFlashdata('danger') ?>
            </div>
            <?php endif; ?>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Pengaturan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- Settings -->
                  <div class="active tab-pane" id="settings">
                    <form action="<?= base_url('admin/profile/updateuser'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="id" class="id" value="<?= user()->id ?>">
                      <input type="hidden" name="oldFile" class="oldFile" value="<?= user()->user_image; ?>">
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="<?= user()->username; ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="fullname" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="fullname" placeholder="Nama" value="<?= user()->fullname; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" placeholder="Email" value="<?= user()->email; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" placeholder="description"><?= user()->desc_user; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="social_media" class="col-sm-2 col-form-label">Social Media</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="twitter" placeholder="Link Twitter" value="<?= user()->soc_twitter; ?>">
                        </div>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" name="facebook" placeholder="Link Facebook" value="<?= user()->soc_facebook; ?>">
                        </div>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" name="instagram" placeholder="Link Instagram" value="<?= user()->soc_instagram; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto Profil</label>
                        <div class="col-sm-10 custom-file">
                          <input type="file" class="form-control custom-file-input" name="image_file" id="customFile" onchange="preview()" accept=".jpg,.png,.jpeg,.gif">
                            <label class="custom-file-label" for="customFile">
                              Pilih Gambar Profil (150 x 150)
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <!-- Password -->
                  <div class="tab-pane" id="password">
                    <form action="<?= base_url('admin/profile/changepassword'); ?>" method="post" class="form-horizontal">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="id" class="id" value="<?= user()->id ?>">
                      <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pass_confirm" class="col-sm-3 col-form-label">Ulangi Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <?= $this->endSection(); ?>

<?= $this->section('page-modal') ?>



<?= $this->endSection(); ?>

<?= $this->section('page-script'); ?>

<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function () {
  bsCustomFileInput.init();
});
</script>

<?= $this->endSection(); ?>