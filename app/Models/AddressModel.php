<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table      = 'addresses';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'customer_id', 'street_address', 'house_no', 'postcode',
        'city', 'state', 'country', 'organization', 'network',
        'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
}
