<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;
use \Myth\Auth\Authorization\GroupModel;
use App\Models\ProfileModel;
use \Myth\Auth\Models\UserModel;
use \Myth\Auth\Password;

class Profile extends Controller
{
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function index()
    {
        $groupModel = new GroupModel();

        $data['group'] = $groupModel->getGroupsForUser(user()->id);

        $blogprofileModel = new ProfileModel();

        $data['blog'] = $blogprofileModel->getBlogProfile();

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Profil', '/admin/profile');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Profil';

        return view('admin/profile', $data);
    }

    public function updateuser()
    {
       $rules = [
            'fullname'     => 'required'
        ];

        $id =  $this->request->getVar('id');

        if (! $this->validate($rules)) {
            return redirect()->to(base_url('admin/profile'))->with('danger', 'Gagal Merubah Data<br/><small>*Nama wajib diisi!<br/>*Email wajib diisi!</small>');
        } else {
            $fileImage_name = $this->request->getPost('oldFile');
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {
                        $fileImage->move('dist/img');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }

            $userModel = new UserModel();
            $userModel->update($id, [
                'user_image' => $fileImage_name,
                'email' => $this->request->getVar('email'),
                'username ' => $this->request->getVar('username '),
                'fullname' => $this->request->getVar('fullname'),
                'desc_user' => $this->request->getVar('description'),
                'soc_twitter' => $this->request->getVar('twitter'),
                'soc_facebook' => $this->request->getVar('facebook'),
                'soc_instagram' => $this->request->getVar('instagram'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->to(base_url('admin/profile'))->with('success', 'Berhasil Merubah Data');
        }
    }

    public function changepassword()
    {
        $userModel = new UserModel();

        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]'
        ];

        if (! $this->validate($rules)) {
            $data = [
                'id' => $this->request->getPost('id'),
                'title' => 'Update Password',
                'validation' => $this->validator
            ];

            // return view('admin/profile', $data);
            return redirect()->to(base_url('admin/profile'))->with('danger', 'Gagal Merubah Password<br/><small>*Huruf depan wajib huruf besar!<br/>*Minimal 8 huruf/angka!</small>');
        } else {
            $userModel->update($this->request->getPost('id'), [
                'password_hash' => Password::hash($this->request->getPost('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null
            ]);

            return redirect()->to(base_url('admin/profile'))->with('success', 'Berhasil Merubah Password');
        }
    }
}