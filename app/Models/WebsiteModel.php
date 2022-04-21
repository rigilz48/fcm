<?php

namespace App\Models;

use CodeIgniter\Model;

class WebsiteModel extends Model
{
    public function getWebsite()
    {
        return $this->db->table('settings_website')
        ->where('id_website', 1)
        ->get()->getResultArray();
    }
}