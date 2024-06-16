<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Companii extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Companies_model', "Companies");
    }

    //! ----------------------------------------------------------------------------
    //! ------------------------------ Views ---------------------------------------
    //! ----------------------------------------------------------------------------

    public function index()
    {
        redirect('companii/lista');
    }

    public function lista()
    {

        $search_term = null;

        $city = null;
        $city_info = null;

        if ($this->input->get('search')) {
            $search_term = $this->input->get('search');
        }

        if ($this->input->get('city')) {
            $city = $this->input->get('city');
            $city_info = $this->Companies->getCityById($city);
        }

        $companies = $this->Companies->getAllCompanies($city, $search_term);


        $data = array(
            'companies' => $companies,
            'city_info' => $city_info,
            'search' => $search_term
        );

        $this->load->view('template/header', array('title' => "Listă companii"));
        $this->load->view('companii/list', $data);
        $this->load->view('template/footer');
    }

    //! ----------------------------------------------------------------------------
    //! ------------------------------ Methods -------------------------------------
    //! ----------------------------------------------------------------------------

    //* Search (footer)

    public function search()
    {
        $search = $this->input->post('search');
        $companies = $this->Companies->getAllCompanies(null, $search);

        $data = array(
            'companies' => $companies
        );

        $this->load->view('template/loaders/search_content', $data);
    }
}
