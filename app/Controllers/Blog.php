<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\BlogModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\WebsiteModel;

class Blog extends BaseController
{
    public function __construct()
    {
        $this->breadcrumb = new Breadcrumb();
        $this->blogging = new BlogModel();
    }

    public function index()
    {
        $website = new WebsiteModel();
        
        $blog = new BlogModel();
        
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $blogger = $this->blogging->search($keyword);
        } else {
            $blogger = $this->blogging;
        }

        $this->breadcrumb->add('Beranda', '/');
        $this->breadcrumb->add('Blog', '/blog');

        $data = [
            'title' => 'Blog',
            'breadcrumbs' => $this->breadcrumb->render(),
            'website' => $website->getWebsite(),
            'blognews' => $blog->getBlognews_limit(),
            'blogcategory' => $blog->getCategory(),
            'blogging' => $blogger->select('blog_img, title_blog, description, fcm_blog.status, users.fullname, users.desc_user, slug, fcm_blog.created_at, fcm_blog.updated_at')->join('users','users.id=fcm_blog.user_id')->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')->where('fcm_blog.status', 1)->orderBy('fcm_blog.id_blog', 'desc')->paginate(10, 'fcm_blog'),
            'pager' => $this->blogging->pager,
        ];

        return view('blog', $data);
    }

    public function blogdetails($slug)
    {
        $website = new WebsiteModel();
        $data['website'] = $website->getWebsite();

        $blog = new BlogModel();

        $data['blogging'] = $blog->getBlog_limit($slug);

        $data['blognews'] = $blog->getBlognews_limit();
        $data['blogcategory'] = $blog->getCategory();

        if (!$data['blogging']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->breadcrumb->add('Beranda', '/');
        $this->breadcrumb->add('Blog', '/blog');
        foreach ($data['blogging'] as $blogger) {
            $this->breadcrumb->add(''.$blogger['title_blog'].'', '/blog/'.$blogger['slug'].'');
        }

        $data['breadcrumbs'] = $this->breadcrumb->render();
        return view('blog-details', $data);
    }
}
