<?php

namespace App\Controllers;

use App\Models\WebsiteModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        $nameto = $this->request->getPost('nameto');
        $emailto = $this->request->getPost('emailto');
        $subjectto = $this->request->getPost('subjectto');
        $messageto = $this->request->getPost('messageto');
        
        $mail = new PHPMailer(true); 

        try {
            $mail->isSMTP();
            $mail->Host         = 'smtp.gmail.com';
            $mail->SMTPAuth     = true;
            $mail->Username     = 'projekrigil@gmail.com';  
		    $mail->Password     = 'bekasi004488';
            $mail->SMTPSecure   = 'tls';  
			$mail->Port         = 587;
            $mail->setFrom($emailto, $nameto);
            $mail->addAddress('rigilmakmun@gmail.com');
            $mail->Subject      = $subjectto;
			$mail->Body         = $messageto;
            $mail->isHTML(true);

            if ($mail->send()) {
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
        } catch (Exception $e) {
            $response = array(
                'status' => false,
                'message' => 'Harap diisi semua data yang tersedia.',
                'token' => csrf_hash()
            );
        }

        echo json_encode($response); 
    }
}
