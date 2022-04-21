<?php foreach ($website as $web) : ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title><?= $web['name_website']; ?></title>

    <!-- Favicon -->
    <link href="<?= base_url('assets/img/'.$web['img_website'].''); ?>" rel="icon">
    <link href="<?= base_url('assets/img/'.$web['img_website'].''); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- CSS -->
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/main.css" rel="stylesheet">
    <?= csrf_meta() ?>
</head>

<body>
    <!-- Header & Navigation -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <img src="<?= base_url('assets/img/'.$web['img_website'].''); ?>" alt="">
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= base_url(); ?>">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>/#cerita-kami">Cerita Kami</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>/#blogger">Blog</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>/#tentang">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>/#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>/#kontak">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <main id="main">
        <!-- Breadcrumbs -->
        <section class="breadcrumbs">
            <?= $breadcrumbs; ?>
        </section>
        
        <!-- Content -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <?php foreach ($blogging as $blog) : ?>
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="<?= base_url('assets/img/blog'); ?>/<?= $blog['blog_img']; ?>" alt="" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <p><?= $blog['title_blog']; ?></p>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $blog['fullname']; ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?= date('Y-m-d', strtotime($blog['updated_at'])) ?>"><?= date('d F Y', strtotime($blog['updated_at'])) ?></time></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p><?= $blog['description']; ?></p>
                            </div>
                            <div class="entry-footer">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="<?= base_url('blog/category') ?>/<?= $blog['slug_category']; ?>"><?= $blog['name_category']; ?></a></li>
                                </ul>
                            </div>
                        </article>
                        
                        <div class="blog-author d-flex align-items-center">
                            <img src="<?= base_url('dist/img'); ?>/<?= $blog['user_image']; ?>" class="rounded-circle float-left" alt="">
                            <div>
                                <h4><?= $blog['fullname']; ?></h4>
                                <?php if($blog['soc_twitter'] OR $blog['soc_facebook'] OR $blog['soc_instagram']): ?>
                                <div class="social-links">
                                    <?php if($blog['soc_twitter']): ?>
                                    <a href="<?= $blog['soc_twitter']; ?>"><i class="bi bi-twitter"></i></a>
                                    <?php endif; ?>

                                    <?php if($blog['soc_facebook']): ?>
                                    <a href="<?= $blog['soc_facebook']; ?>"><i class="bi bi-facebook"></i></a>
                                    <?php endif; ?>
                                    
                                    <?php if($blog['soc_instagram']): ?>
                                    <a href="<?= $blog['soc_instagram']; ?>"><i class="biu bi-instagram"></i></a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <p>
                                    <?= $blog['desc_user']; ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <?= $this->include('sidebar-blog'); ?>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; 2021 <strong><span><?= $web['name_website']; ?>.</span></strong>
            </div>
        </div>
    </footer>
    <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> -->

    <!-- JS -->
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/main.js"></script>
</body>
</html>
<?php endforeach; ?>