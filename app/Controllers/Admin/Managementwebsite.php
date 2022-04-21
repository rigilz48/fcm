<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;
use App\Models\WebsiteModel;

class Managementwebsite extends Controller
{
    protected $helpers = ['form'];
    
    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function index()
    {
        $website = new WebsiteModel();

        $data['website'] = $website->getWebsite();

        $db      = \Config\Database::connect();
        $builder = $db->table('settings_website');

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Management Website', '/admin/managementwebsite');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Management Website';

        return view('admin/management-website', $data);
    }

    public function updatewebsite()
    {
        $rules = [
            'name_website' => 'required'
        ];

        if($this->validate($rules)){
            $fileImage_name = $this->request->getPost('oldFile');
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {
                        $fileImage->move('assets/img');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }

            $db      = \Config\Database::connect();
            $builder = $db->table('settings_website');
        
            $data = [
                'img_website' => $fileImage_name,
                'name_website' => $this->request->getPost('name_website'),
                'description_website' => $this->request->getPost('description_website'),
                'email_website' => $this->request->getPost('email_website')
            ];

            $builder->where('id_website', $this->request->getPost('id_website'));
            $builder->update($data);

            return redirect()->to(base_url('admin/management/website'))->with('success', 'Website telah di perbarui');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Management Website';
            return redirect()->to(base_url('admin/management/website'))->with('danger', 'Website gagal di perbarui');
        }
    }
}