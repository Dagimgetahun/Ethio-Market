<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Listdelivery extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery_model'); // Adjusted model name to Delivery_model
    }

    public function index()
    {
        $this->login_check();

        $data = array();
        $head = array();
        $head['title'] = 'Administration - Admin Delivery Boys'; // Adjusted title
        $head['description'] = '!'; // Adjusted description
        $head['keywords'] = '';
        $id = null;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $data['delivery_boys'] = $this->Delivery_model->getDeliveryBoys($id); // Adjusted method name
        $data['controller'] = $this;
        
        $this->load->view('_parts/header', $head);
        $this->load->view('delivery/listDelivery', $data); // Adjusted view file name
        

        $this->load->view('_parts/footer');
        $this->saveHistory('Go to Admin Delivery Boys List');
    }

    public function getDeliveryBoyOrders($id)
    {
        return $this->Delivery_model->getDeliveryBoyOrders($id); // Adjusted method name
    }
}
