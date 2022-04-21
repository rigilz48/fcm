<div class="col-lg-4">
                        <div class="sidebar">
                            <!-- Search -->
                            <h3 class="sidebar-title">Cari</h3>
                            <div class="sidebar-item search-form">
                                <form action="" method="get">
                                    <input type="text" name="keyword">
                                    <button type="submit" name="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <!-- Kategori -->
                            <h3 class="sidebar-title">Kategori</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <?php foreach ($blogcategory as $category) : ?>
                                    <li><a href="<?= base_url('category/'.$category['slug_category'].'') ?>"><?= $category['name_category']; ?> </a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>

                            <!-- Post Terbaru -->
                            <h3 class="sidebar-title">Blog Terbaru</h3>
                            <div class="sidebar-item recent-posts">
                                <?php foreach ($blognews as $blog) : ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url('assets/img/blog'); ?>/<?= $blog['blog_img']; ?>" alt="">
                                    <h4><a href="<?= base_url('blog'); ?>/<?= $blog['slug']; ?>"><?= $blog['title_blog']; ?></a></h4>
                                    <time datetime="2021-01-01"><?= date('d F Y', strtotime($blog['updated_at'])) ?></time>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>