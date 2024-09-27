<?php
// application/controllers/DeliveryBoy.php

class DeliveryBoy extends MY_Controller {
    
    public function index() {
        // Load the view for the delivery boy page
        $this->load->view('delivery_boy/index');
    }
    
    public function home() {
        // Load the view for the delivery boy home page with the link to view orders
        $data['view_orders_link'] = base_url('DeliveryBoy/orders'); // Link to view orders
        $this->load->view('delivery_boy/home', $data);
    }
    
    public function register() {
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[delivery_boy_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if ($this->form_validation->run() == FALSE) {
            // Registration failed, show registration form with validation errors
            $this->load->view('delivery_boy/register');
        } else {
            // Registration successful, insert data into the database
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            $this->db->insert('delivery_boy_users', $data);
            // Redirect to login page or home page
            redirect('DeliveryBoy/login');
        }
    }
    
    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        $user = $this->db->get_where('delivery_boy_users', ['email' => $email])->row();
    
        if ($user && password_verify($password, $user->password)) {
            // Login successful, set sessions and redirect to home page
            $this->session->set_userdata('user_id', $user->id);
            // Redirect to home page or wherever you want
            redirect('DeliveryBoy/home');
        } else {
            // Login failed, show login form with error message
            $this->load->view('delivery_boy/login', ['error' => 'Invalid email or password']);
        }
    }
    
    // In your DeliveryBoy controller
public function orders() {
    // Assuming $messages is an array of messages
    $data['messages'] = array(/* Your messages data */);

    // Load the view with the data
    $this->load->view('delivery_boy/Orders', $data);
}

    
    
    
    // Add more methods as needed for specific functionality
}
