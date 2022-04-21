<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;
use App\Models\ContactModel;

class Contact extends Controller
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function index()
    {
        $contact = new ContactModel();
        $data['contact'] = $contact->getContact();
        
        $this->breadcrumb->add('Beranda', '/admin');
        $this->breadcrumb->add('Kontak', '/admin/contact');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Kontak';

        return view('admin/contact', $data);
    }

    public function deletecontact()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('contact_form');

        $builder->where('id_contact', $this->request->getPost('id'));
        $builder->delete();

        return redirect()->to(base_url('admin/contact'))->with('success', 'Kontak Pesan Berhasil Dihapus</b>');
    }
}