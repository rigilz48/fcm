<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    public function getContact()
    {
        return $this->db->table('contact_form')
        ->orderBy('id_contact', 'desc')
        ->get()->getResultArray();
    }
}