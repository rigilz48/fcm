<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use App\Libraries\Breadcrumbadmin;

class Home extends Controller
{
    public function __construct()
    {
        $this->breadcrumb = new Breadcrumbadmin();
    }

    public function index()
    {
        $this->breadcrumb->add('Beranda', '/');

        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = 'Beranda';

        return view('admin/home', $data);
    }
}
