<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


// For login
if (!function_exists('isNotAuth')) {
    function isNotAuth()
    {
        $CI = &get_instance();
        if ($CI->session->userdata('user_informations') == TRUE) {
            redirect('/');
        }
    }
}

// For rest
if (!function_exists('isAuth')) {
    function isAuth()
    {
        $CI = &get_instance();
        if ($CI->session->userdata('user_informations') != TRUE) {
            return '/auth/login';
        }
    }
}

if (!function_exists('checkAccess')) {
    function checkAccess($class = null)
    {
        $CI = &get_instance();

        if ($class == null) {
            $class = $CI->router->fetch_class();
        }

        $CI->db->where('id_user', $CI->session->userdata('user_info')['id_user']);
        $CI->db->where('controller', $class);
        $result = $CI->db->get('users_access');
        if ($result->num_rows() > 0) {
            return true;
        } else {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode(array("error" => true, "message" => "No access"));
            die();
        }
    }
}
