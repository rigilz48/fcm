<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    public function getBlogProfile()
    {
        return $this->db->table('fcm_blog')
        ->select('COUNT(id_blog) as total')
        ->where('user_id', user()->id)
        ->get()->getResultArray();
    }
}