<?php

namespace App\Controllers;

// use App\Controllers\BaseController;
// use CodeIgniter\HTTP\ResponseInterface;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{

    public function index()
    {
        return view('customer_search');
    }

    // 2. Return suggestions as JSON
    public function searchSuggestions()
    {
        $query = $this->request->getGet('q');  // 'q' is the query param from AJAX
        $model = new CustomerModel();

        // Simple LIKE query on 'name' or 'email'
        $results = $model->like('full_name', $query)
                         ->orLike('email', $query)
                         ->findAll();

        // Return JSON data
        return $this->response->setJSON($results);
    }

    public function storeContact()
    {
        $customerModel = new CustomerModel();

        // Insert new customer record
        $data = [
            'full_name'     => $this->request->getPost('full_name'),
            'phone_number'  => $this->request->getPost('phone_number'),
            'email'         => $this->request->getPost('email'),
            'tax_class'     => $this->request->getPost('tax_class'),
            'heard_about_us'=> $this->request->getPost('heard_about_us'),
        ];

        // Create and get inserted ID
        $customerModel->insert($data);
        $newCustomerId = $customerModel->getInsertID();

        // Return JSON with new ID
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Contact information saved.',
            'customer_id' => $newCustomerId,
        ]);
    }

    // 4) AJAX: Store address info (second tab)
    public function storeAddress()
    {
        $addressModel = new \App\Models\AddressModel();

        $data = [
            'customer_id'    => $this->request->getPost('customer_id'),
            'street_address' => $this->request->getPost('street_address'),
            'house_no'       => $this->request->getPost('house_no'),
            'postcode'       => $this->request->getPost('postcode'),
            'city'           => $this->request->getPost('city'),
            'state'          => $this->request->getPost('state'),
            'country'        => $this->request->getPost('country'),
            'organization'   => $this->request->getPost('organization'),
            'network'        => $this->request->getPost('network'),
        ];

        // Optional: log the POST data for debugging
        // log_message('debug', 'Address Data: ' . print_r($data, true));

        if ($addressModel->insert($data)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Address information saved.'
            ]);
        } else {
            // Log errors if insertion fails:
            // log_message('error', 'Address insertion error: ' . print_r($addressModel->errors(), true));
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Address information saving failed.'
            ]);
        }
    }

}
