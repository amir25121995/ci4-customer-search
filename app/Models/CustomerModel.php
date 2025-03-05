<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name',
        'phone_number',
        'email',         
        'tax_class',
        'heard_about_us'
    ];

    protected $useTimestamps = true;
}
