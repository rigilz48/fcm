<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;
use Irsyadulibad\DataTables\DataTables;
use App\Models\BlogModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Blog extends Controller
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function blog_json()
    {
        return DataTables::use('fcm_blog')
            ->select('id_blog, blog_img, title_blog, fcm_blog.status, fcm_blog.user_id, users.fullname AS name,fcm_blog.created_at, fcm_blog.updated_at')
            ->join('users', 'fcm_blog.user_id=users.id', 'INNER JOIN')
            ->addColumn('action', function($data) {
                return '<a href="'.base_url('admin/blog/edit/'.$data->id_blog.'').'" class="btn"><i class="far fa-edit text-warning"></i></a><a href="#" data-href="'.base_url('admin/blog/delete/'.$data->id_blog.'').'" onclick="confirmToDelete(this)" class="btn"><i class="far fa-trash-alt text-danger"></i></a>';
            })->rawColumns(['action'])
            ->make(true);
    }

    public function index()
    {
        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Blog', '/admin/blog');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Blog';

        return view('admin/blog/index', $data);
    }

    public function add()
    {
        $blog = new BlogModel();

        $data['blogcategory'] = $blog->getCategory();

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Blog', '/admin/blog');
        $this->breadcrumb->add('Tambah Blog', '/admin/blog/add');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Blog - Tambah Blog';

        return view('admin/blog/add', $data);
    }

    public function save()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image_file' => 'uploaded[image_file]|is_image[image_file]'
        ];

        if($this->validate($rules)){
            $fileImage_name = "";
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {
                        $fileImage->move('assets/img/blog');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            
            $blog = new BlogModel();
            $blog->insert([
                'blog_img' => $fileImage_name,
                'title_blog' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'status' => $this->request->getPost('status'),
                'user_id' => $this->request->getPost('user_id'),
                'slug' => url_title($this->request->getPost('title'), '-', true),
                'category_id' => $this->request->getPost('category'),
                'created_at' => $this->request->getPost('tanggal'),
                'updated_at' => $this->request->getPost('tanggal'),
            ]);

            return redirect()->to(base_url('admin/blog'));
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Blog - Tambah Blog';
            return view('admin/blog/add', $data);
        }
    }

    public function view($id_blog)
    {
        $blog = new BlogModel();
        $data['blog'] = $blog->getBlogEdit($id_blog);

        if(!$data['blog']){
            throw PageNotFoundException::forPageNotFound();
        }

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Blog', '/admin/blog');
        $this->breadcrumb->add('Lihat Blog', '/admin/blog/view');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Blog - Lihat Blog';
        
        return view('admin/blog/view', $data);
    }

    public function edit($id_blog)
    {
        $blog = new BlogModel();
        $data['blog'] = $blog->getBlogEdit($id_blog);
        $data['category'] = $blog->getCategory();

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Blog', '/admin/blog');
        $this->breadcrumb->add('Ubah Blog', '/admin/blog/edit');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Blog - Ubah Blog';

        return view('admin/blog/edit', $data);
        
    }

    public function update()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];

        $id_blog =  $this->request->getVar('id_blog');

        if($this->validate($rules)){
            $fileImage_name = $this->request->getPost('oldFile');
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {
                        $fileImage->move('assets/img/blog');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $blogsave = new BlogModel();
            $blogsave->update($id_blog, [
                'blog_img' => $fileImage_name,
                'title_blog' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'status' => $this->request->getPost('status'),
                'slug' => url_title($this->request->getPost('title'), '-', true),
                'category_id' => $this->request->getPost('category'),
                'updated_at' => $this->request->getPost('tanggal'),
            ]);

            return redirect()->to(base_url('admin/blog'));
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Blog - Ubah Blog';
            return view('admin/blog/edit', $data);
        }
    }

    public function delete($id_blog)
    {
        $blog = new BlogModel();
        $blog->delete($id_blog);

        return redirect()->to(base_url('admin/blog'));
    }
}
