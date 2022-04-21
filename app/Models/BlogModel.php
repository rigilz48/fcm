<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'fcm_blog';
    protected $primaryKey = 'id_blog';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_blog', 'blog_img', 'title_blog', 'description', 'status', 'user_id', 'slug', 'category_id', 'created_at', 'updated_at'];

    public function getBlog()
    {
        return $this->db->table('fcm_blog')
        ->select('blog_img, title_blog, description, fcm_blog.status, users.fullname, users.desc_user, slug, fcm_blog.created_at, fcm_blog.updated_at')
        ->join('users','users.id=fcm_blog.user_id')
        ->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')
        ->where('fcm_blog.status', 1)
        ->orderBy('fcm_blog.id_blog', 'desc')
        ->get()->getResultArray();
    }

    public function getBlogEdit($id_blog)
    {
        return $this->db->table('fcm_blog')
        ->select('id_blog, blog_img, title_blog, description, fcm_blog.status, fcm_blog.slug, category_id, fcm_category.name_category, fcm_blog.updated_at')
        ->join('users','users.id=fcm_blog.user_id')
        ->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')
        ->Where('id_blog', $id_blog)
        ->get()->getResultArray();
    }

    public function getBlog_limit($slug)
    {
        return $this->db->table('fcm_blog')
        ->select('blog_img, title_blog, description, fcm_category.name_category, fcm_category.slug_category, fcm_blog.status, users.user_image, users.fullname, users.desc_user, users.soc_twitter, users.soc_facebook, users.soc_instagram, slug, fcm_blog.created_at, fcm_blog.updated_at')
        ->join('users','users.id=fcm_blog.user_id')
        ->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')
        ->where('fcm_blog.status', '1')
        ->Where('slug', $slug)
        ->limit(1)
        ->get()->getResultArray();
    }

    public function getCategory_limit($slug_category)
    {
        return $this->db->table('fcm_blog')
        ->select('blog_img, title_blog, description, fcm_category.name_category, fcm_category.slug_category, fcm_blog.status, users.user_image, users.fullname, users.desc_user, users.soc_twitter, users.soc_facebook, users.soc_instagram, slug, fcm_blog.created_at, fcm_blog.updated_at')
        ->join('users','users.id=fcm_blog.user_id')
        ->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')
        ->where('fcm_blog.status', '1')
        ->Where('slug_category', $slug_category)
        ->limit(1)
        ->get()->getResultArray();
    }

    public function getBlognews_limit()
    {
        return $this->db->table('fcm_blog')
        ->select('blog_img, title_blog, description, fcm_category.name_category, fcm_category.slug_category, fcm_blog.status, users.user_image, users.fullname, users.desc_user, users.soc_twitter, users.soc_facebook, users.soc_instagram, slug, fcm_blog.created_at, fcm_blog.updated_at')
        ->join('users','users.id=fcm_blog.user_id')
        ->join('fcm_category', 'fcm_category.id_category=fcm_blog.category_id')
        ->where('fcm_blog.status', '1')
        ->orderBy('fcm_blog.id_blog', 'desc')
        ->limit(5)
        ->get()->getResultArray();
    }

    public function getCategory()
    {
        return $this->db->table('fcm_category')
        ->orderBy('id_category', 'desc')
        ->get()->getResultArray();
    }

    public function search($keyword)
    {
        // $builder = $this->table('fcm_blog');
        // $builder->like('title_blog', $keyword);
        // return $builder;

        return $this->table('fcm_blog')->like('title_blog', $keyword);
    }
}