<?php

namespace App\Controllers;

use App\Models\WebsiteModel;

class Home extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fcm_blog');
        $builder->select('blog_img, title_blog, slug, created_at');
        $builder->where('status', '1');
        $builder->orderBy('id_blog', 'DESC');
        $builder->limit(3);
        $query   = $builder->get()->getResultArray();

        $data['blogging'] = $query;

        $website = new WebsiteModel();
        $data['website'] = $website->getWebsite();

        return view('home', $data);
    }

    public function sendemail()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('contact_form');

        $name_contact = $this->request->getPost('nameto');
        $email_contact = $this->request->getPost('emailto');
        $subject_contact = $this->request->getPost('subjectto');
        $message_contact = $this->request->getPost('messageto');

        $data = [
            'name_contact' => $name_contact,
            'email_contact' => $email_contact,
            'subject_contact' => $subject_contact,
            'message_contact' => $message_contact
        ];
        $contactform = $builder->insert($data);

        if (!empty($name_contact) && !empty($email_contact) && !empty($subject_contact) && !empty($message_contact)) {

            if ($contactform == TRUE) {
                $response = array(
                    'status' => true,
                    'message' => 'Pesan Telah Terkirim',
                    'token' => csrf_hash()
                );
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Pesan Tidak Terkirim',
                    'token' => csrf_hash()
                );
            }
        } else {
            $response = array(
                'status' => false,
                'message' => 'Harap diisi semua data yang tersedia.',
                'token' => csrf_hash()
            );
        }
        echo json_encode($response);
    }
}
