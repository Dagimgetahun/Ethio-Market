<?php
// application/models/Delivery_model.php

class Delivery_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    // Method to insert message into the 'delivery_asset' table
    public function insertMessage($message) {
        $data = array(
            'message' => $message
        );

        // Insert data into the 'delivery_asset' table
        $this->db->insert('delivery_asset', $data);
        
        // Check if the insert was successful
        return $this->db->affected_rows() > 0;
    }
}
?>
