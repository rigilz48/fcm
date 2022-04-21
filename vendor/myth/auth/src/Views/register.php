<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url(); ?>" class="h1"><b><?= APP_NAMESPACE; ?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= view('Myth\Auth\Views\_message_block') ?></p>

      <form action="<?= route_to('register') ?>" method="post">
      <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <input type="email" name="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?= route_to('login') ?>" class="text-center"><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?= $this->endSection() ?>