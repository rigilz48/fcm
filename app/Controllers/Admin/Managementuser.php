<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;
use \Myth\Auth\Models\UserModel;
use \Myth\Auth\Password;
use \Myth\Auth\Authorization\GroupModel;

class Managementuser extends Controller
{
    protected $helpers = ['form', 'auth'];
    
    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        
        $groupModel = new GroupModel();

        foreach ($data['users'] as $row) {
            $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
            $dataRow['row'] = $row;
            $data['row'.$row->id] = view('admin/row', $dataRow);
        }

        $data['groups'] = $groupModel->findAll();

        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Management User', '/admin/managementuser');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Management User';

        return view('admin/management-user', $data);
    }

    public function adduser()
    {
        $userModel = new UserModel();

        $userModel->insert([
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'desc_user' => NULL,
            'password_hash' => Password::hash($this->request->getPost('password')),
            'reset_hash' => null,
            'reset_at' => null,
            'reset_expires' => null,
            'active' => 1,
            'force_pass_reset' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('admin/management/user'))->with('success', 'User Berhasil Ditambah');
    }

    public function activate()
    {
        $userModel = new UserModel();

        $userModel->update($this->request->getPost('id'), [
            'activate_hash' => null,
            'active' => $this->request->getPost('active') == '0' || '' ? '1' : '0'
        ]);

        return redirect()->to(base_url('admin/management/user'))->with('success', 'Berhasil Merubah Aktif User');
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

            return redirect()->to(base_url('admin/management/user'));
        } else {
            $userModel->update($this->request->getPost('id'), [
                'password_hash' => Password::hash($this->request->getPost('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null
            ]);

            return redirect()->to(base_url('admin/management/user'))->with('success', 'Berhasil Merubah Password');
        }
    }

    public function changegroup()
    {
        $userId = $this->request->getVar('id');
        $groupId = $this->request->getVar('group');

        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));

        $groupModel->addUserToGroup(intval($userId), intval($groupId));

        return redirect()->to(base_url('admin/management/user'))->with('success', 'Berhasil Merubah Grup User');
    }

    // public function deleteuser()
    // {
    //     $userModel = new UserModel();

    //     $userId = $this->request->getVar('id');

    //     $userModel->where('id', $userId)->delete();

    //     return redirect()->to(base_url('admin/management/user'))->with('success', 'User Berhasil Dihapus');
    // }
}