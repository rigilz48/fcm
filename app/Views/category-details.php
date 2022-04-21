<?php foreach ($website as $web) : ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title><?= $web['name_website']; ?> - <?= $title ?></title>

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
                        <?php foreach ($categoryblog as $category) : ?>
                            <article class="entry entry-single">
                                <div class="entry-img">
                                    <img src="<?= base_url('assets/img/blog'); ?>/<?= $category['blog_img']; ?>" alt="" class="img-fluid">
                                </div>
                                <h2 class="entry-title">
                                    <p><?= $category['title_blog']; ?></p>
                                </h2>
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $category['fullname']; ?></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?= date('Y-m-d', strtotime($category['updated_at'])) ?>"><?= date('d F Y', strtotime($category['updated_at'])) ?></time></a></li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <div class="entry-limit">
                                        <p><?= $category['description']; ?></p>
                                    </div>
                                </div>
                                <div class="entry-footer">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a href="<?= base_url('blog/category/'.$category['slug_category'].'') ?>"><?= $category['name_category']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="read-more mt-3">
                                    <a href="<?= base_url('blog/'.$category['slug'].''); ?>">Selengkapnya</a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                        <?= $pager->links('fcm_blog', 'blog_pagination') ?>
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