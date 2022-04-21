<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models\WebsiteModel;
use App\Models\BlogModel;

class Category extends BaseController
{
    public function __construct()
    {
        $this->breadcrumb = new Breadcrumb();
        $this->website = new WebsiteModel();
        $this->blogging = new BlogModel();
    }

    public function index($slug_category)
    {
        $limit = $this->blogging->getCategory_limit($slug_category);

        $this->breadcrumb->add('Beranda', '/');
        $this->breadcrumb->add('Blog', '/blog');
        foreach ($limit as $breadcrum) {
            $this->breadcrumb->add(''.$breadcrum['name_category'].'', '/category/'.$breadcrum['slug_category'].'');
        }

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $category = $this->blogging->search($keyword);
        } else {
            $category = $this->blogging;
        }
        
        $data = [
            'title' => 'Category',
            'website' => $this->website->getWebsite(),
            'breadcrumbs' => $this->breadcrumb->render(),
            'blognews' => $this->blogging->getBlognews_limit(),
            'blogcategory' => $this->blogging->getCategory(),
            'categoryblog' =>  $category->select('blog_img, title_blog, description, fcm_blog.status, users.fullname, users.desc_user, slug, fcm_blog.created_at, fcm_blog.updated_at, fcm_category.name_category, fcm_category.slug_category')->join('users','users.id=fcm_blog.user_id')->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')->where('fcm_blog.status', '1')->where('fcm_category.slug_category', $slug_category)->orderBy('fcm_blog.id_blog', 'desc')->paginate(10, 'fcm_blog'),
            'pager' => $this->blogging->pager,
        ];

        return view('category-details', $data);
    }
}