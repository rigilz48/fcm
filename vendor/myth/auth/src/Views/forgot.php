<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url(); ?>" class="h1"><b><?= APP_NAMESPACE; ?></b></a>
    </div>
    <div class="card-body">
    <?=lang('Auth.enterEmailForInstructions')?>
      <p class="login-box-msg"><?= view('Myth\Auth\Views\_message_block') ?></p>
      <form action="<?= route_to('forgot') ?>" method="post">
      <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.sendInstructions')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="<?= route_to('login') ?>">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>