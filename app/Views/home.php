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
                    <li><a class="nav-link scrollto active" href="#beranda">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#cerita-kami">Cerita Kami</a></li>
                    <li><a class="nav-link scrollto" href="#blogger">Blog</a></li>
                    <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <!-- Cover -->
    <section id="beranda" class="cover d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column">
                    <?= $web['description_website']; ?>
                </div>
                <div class="col-lg-5 cover-img">
                    <img src="<?= base_url(); ?>/assets/img/cover2.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <main id="main">
        <!-- Cerita Kami -->
        <section id="cerita-kami" class="story d-flex align-items-center">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <div class="content">
                            <h2>Cerita Kami</h2>
                            <p>
                                Sudah 3 season kita lewati mulai dari makanan yang ada di Kota Bandung, Makanan Nusantara, sampai makanan-makanan yang viral juga kita gibahin. Next season ada apa lagi ya???
                            </p>
                            <div class="text-center text-lg-start"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="<?= base_url(); ?>/assets/img/ceritakami2.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog -->
        <section id="blogger" class="recent-blog d-flex align-items-center">
            <div class="container">
                <header class="section-header">
                    <p class="p-blog">Blog</p>
                </header>
                <div class="row">
                    <?php foreach ($blogging as $blog): ?>
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img src="<?= base_url('assets/img/blog/'.$blog['blog_img'].'') ?>" class="img-fluid" alt="" style="height: 200px; width: 100%;"></div>
                            <span class="post-date"><?= date('d F Y', strtotime($blog['created_at'])) ?></span>
                            <h3 class="post-title"><?= $blog['title_blog']; ?></h3>
                            <a href="<?= base_url('blog/'.$blog['slug'].''); ?>" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="all-blog"><a href="<?= base_url('blog'); ?>" target="_blink">SEMUA BLOG</a></div>
                </div>
            </div>
        </section>

        <!-- Tentang -->
        <section id="tentang" class="about d-flex align-items-center">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <div class="content">
                            <h2>Tentang</h2>
                            <p class="content-tentang">
                                Foodcast Cerita Makanan dibentuk pada tanggal 24 Oktober 2020. Sudah satu tahun podcast ini menggibahkan makanan dengan merilis kurang lebih 43 episode dan melewati 3 season selama satu tahun ini. Foodcast Cerita Makanan adalah salah satu media yang mencertiakan dunia kuliner dengan santai, bercerita layaknya seorang teman, dan ada selipan komedi di dalamnya.
                                <br/>
                                Foodcast Cerita Makanan juga mengajak para pendengar dan kami menyebutnya paralapar, untuk membagikan momen kulineran kalian dengan kami. Pengalaman menarik, lucu, dan juga unik apapun itu kami terima, dan bersedia akan kami bawakan dalam podcast. Oleh karena itu podcast ini bukan cerita tentang kami saja, tetapi juga cerita dari kalian. We hope you enjoy every episode, see you next time and stay hungry.
                            </p>
                            <div class="text-center text-lg-start"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="<?= base_url(); ?>/assets/img/tentang2.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section id="team" class="team d-flex align-items-center">
            <div class="container">
                <header class="section-header text-center">
                    <p class="p-team">Team</p>
                </header>
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="<?= base_url(); ?>/assets/img/team/1.png" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Brama Ramadhan</h4>
                                <span>Host & Content Writer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="<?= base_url(); ?>/assets/img/team/2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Anggara Wahyu</h4>
                                <span>Co-Host, Graphic Designer & Social Media Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kontak -->
        <section id="kontak" class="contact d-flex align-items-center">
            <div class="container">
                <header class="section-header text-center">
                    <p class="p-contact">Kontak</p>
                    <p class="sub-contact">Hubungi kami di sosial media atau email yang tersedia</p>
                </header>
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="info-box">
                                  <h3>Social media</h3>
                                  <a href="https://www.instagram.com/foodcastceritamakanan/" class="btn btn-socmed" title="Instagram"><i class="bi bi-instagram"></i></a>
                                  <a href="https://twitter.com/cerita_makanan" class="btn btn-socmed" title="Twitter"><i class="bi bi-twitter"></i></a>
                                  <a href="" class="btn btn-socmed" title="Tiktok"><i class="bi bi-tiktok"></i></a>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="info-box">
                                  <h3>Email</h3>
                                  <a href="mailto:<?= $web['email_website']; ?>" class="btn btn-email"><?= $web['email_website']; ?></a>
                                </div>
                              </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="" class="email-form" id="emailform">
                        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" id="nameto" name="nameto" class="form-control" placeholder="Nama">
                                </div>
                                <div class="col-md-6 ">
                                    <input type="email" id="emailto" class="form-control" name="emailto" placeholder="Email">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" id="subjectto" class="form-control" name="subjectto" placeholder="Subjek">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" id="messageto" name="messageto" rows="4" placeholder="Pesan"></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="loading" id="loading">Loading</div>
                                    <div class="error-message" id="errormessage">GAGAL</div>
                                    <div class="sent-message" id="sentmessage">BERHASIL</div>
                                    <button type="submit" id="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
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

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#emailform").on("submit", function(event) {
                event.preventDefault();
                var nameto = $('#nameto').val();
                var emailto = $('#emailto').val();
                var subjectto = $('#subjectto').val();
                var messageto = $('#messageto').val();

                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                if (nameto == "") {
                    $("#errormessage").css("display", "block");
                    $("#errormessage").text("Nama Wajib Diisi!");

                    return false;
                }
                if (emailto == "") {
                    $("#errormessage").css("display", "block");
                    $("#errormessage").text("Email Wajib Diisi!");

                    return false;
                }
                if (subjectto == "") {
                    $("#errormessage").css("display", "block");
                    $("#errormessage").text("Subjek Wajib Diisi!");

                    return false;
                }
                if (messageto == "") {
                    $("#errormessage").css("display", "block");
                    $("#errormessage").text("Pesan Wajib Diisi!");

                    return false;
                }
                $("#errormessage").css("display", "none");
                $("#loading").css("display", "block");
                $('#submit').html('Tunggu Sebentar...');
                $('#submit').prop('disabled', true);
                $.ajax({
                    url: "<?= base_url('home/sendemail'); ?>",
                    method: "POST",
                    data: {
                        nameto: nameto,
                        emailto: emailto,
                        subjectto: subjectto,
                        messageto: messageto,
                        [csrfName]: csrfHash
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            $("#loading").css("display", "none");
                            $("#sentmessage").css("display", "block");
                            $("#sentmessage").text(data.message);

                            $("#emailform").trigger('reset');
                            $("#submit").html('Kirim Pesan');
                            $('#submit').prop('disabled', false);

                            // Update CSRF hash
                            $('.txt_csrfname').val(data.token);
                        } else {
                            $("#loading").css("display", "none");
                            $("#errormessage").css("display", "block");
                            $("#errormessage").text(data.message);

                            $("#submit").html('Kirim Pesan');
                            $('#submit').prop('disabled', false);

                            // Update CSRF hash
                            $('.txt_csrfname').val(data.token);
                        }
                    }
                });
            });
        });
    </script>

</html>
<?php endforeach; ?>