<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;
use App\Models\BlogModel;

class Categoryblog extends Controller
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function index()
    {
        $blog = new BlogModel();

        $data['blogcategory'] = $blog->getCategory();

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Kategori Blog', '/admin/categoryblog');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Kategori Blog';

        return view('admin/category-blog', $data);
    }

    public function addcategory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fcm_category');

        $data = [
            'name_category' => $this->request->getPost('name_category'),
            'slug_category' => url_title($this->request->getPost('name_category'), '-', true)
        ];

        $builder->insert($data);

        return redirect()->to(base_url('admin/categoryblog'))->with('success', 'Kategori Berhasil Ditambah');
    }

    public function changecategory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fcm_category');

        $data = [
            'name_category' => $this->request->getPost('name'),
            'slug_category' => url_title($this->request->getPost('name'), '-', true)
        ];

        $builder->where('id_category', $this->request->getPost('id'));
        $builder->update($data);

        return redirect()->to(base_url('admin/categoryblog'))->with('success', 'Kategori Berhasil Diubah : <b>'.$this->request->getPost('name').'</b>');
    }

    public function deletecategory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fcm_category');

        $builder->where('id_category', $this->request->getPost('id'));
        $builder->delete();

        return redirect()->to(base_url('admin/categoryblog'))->with('success', 'Kategori Berhasil Dihapus</b>');
    }
}