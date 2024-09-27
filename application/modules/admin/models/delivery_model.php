<?php

class Delivery_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDeliveryBoys($id = null)
    {
        if($id !== null && (int)$id > 0) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get('delivery_boy_users'); // Adjusted table name
        return $query;
    }

    public function getDeliveryBoyOrders($delivery_id)
    {
        $this->db->from('delivery_boy_users'); // Adjusted table name
        $this->db->where('delivery_boy_users.id', $delivery_id); // Adjusted table name
        $this->db->join('delivery_orders', 'delivery_orders.delivery_id = delivery_boy_users.id'); // Adjusted table name
        $query = $this->db->get();
        return $query->result_array();
    }
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

