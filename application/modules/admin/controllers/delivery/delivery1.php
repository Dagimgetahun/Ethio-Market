<?php
class Delivery1 extends ADMIN_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Delivery_model');
        $this->load->library('form_validation');
    }

    // Controller method to display the form for sending orders/messages
    public function sendOrderForm() {
        $this->load->view('admin/delivery/send_message_form');
        
    }

    // Controller method to process the submission of orders/messages
    public function sendOrder() {
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, redirect to the form page
            $this->sendOrderForm(); // Call the method to load the form view
        } else {
            // Form validation passed, handle message insertion
            $message = $this->input->post('message');
            $inserted = $this->Delivery_model->insertMessage($message);
            
            if($inserted) {
                // Message inserted successfully
                echo "Message sent successfully!";
            } else {
                // Failed to insert message
                echo "Failed to send message!";
            }
        }
    }
    
}