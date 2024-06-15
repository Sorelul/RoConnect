<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autocomplete extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        isAuth();
    }

    public function get_cities_autocomplete()
    {
        $response = null;
        $term = $this->input->get("search");
        if ($term) {
            $this->db->like('cities_name', $term, 'both');
            $result = $this->db->get('cities');
            $response =  $result->result();
        }

        header('Content-Type: application/json; charset=utf-8');
        http_response_code(200);
        echo json_encode($response);
    }
}
