<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url(); ?>" class="h1"><b><?= APP_NAMESPACE; ?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= view('Myth\Auth\Views\_message_block') ?></p>

      <form action="<?= route_to('login') ?>" method="post">
      <?= csrf_field() ?>
      <?php if ($config->validFields === ['email']): ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="login" placeholder="<?=lang('Auth.email')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="<?=lang('Auth.password')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        <?php if ($config->allowRemembering): ?>
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
              <label for="remember">
              <?=lang('Auth.rememberMe')?>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <?php endif; ?>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php if ($config->activeResetter): ?>
      <p class="mb-1">
        <a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a>
      </p>
      <?php endif; ?>

      <?php if ($config->allowRegistration) : ?>
      <p class="mb-0">
        <a href="<?= route_to('register') ?>" class="text-center"><?=lang('Auth.needAnAccount')?></a>
      </p>
      <?php endif; ?>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>