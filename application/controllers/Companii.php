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

    public function adaugare()
    {
        isAuth();

        $this->load->view('template/header', array('title' => "Adăugare companie"));
        $this->load->view('companii/add');
        $this->load->view('template/footer');
    }

    public function vizualizare($companies_cui)
    {
        $company = $this->Companies->getCompanyByCUI($companies_cui);

        if ($company) {
            $data = array(
                'company' => $company
            );

            $this->load->view('template/header', array('title' => $company->companies_name));
            $this->load->view('companii/view', $data);
            $this->load->view('template/footer');
        } else {
            redirect('companii/lista');
        }
    }

    //! ----------------------------------------------------------------------------
    //! ------------------------------ Methods -------------------------------------
    //! ----------------------------------------------------------------------------

    //* API Companii

    public function adaugare_companie()
    {
        isAuth();
        $response = new stdClass();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('company_name', 'Nume', 'required');
        $this->form_validation->set_rules('company_address', 'Adresă', 'required');
        $this->form_validation->set_rules('company_cui', 'CUI', 'required');
        $this->form_validation->set_rules('company_nr_reg_com', 'Registrul comertului', 'required');
        $this->form_validation->set_rules('company_postal_code', 'Cod postal', 'required');
        $this->form_validation->set_rules('company_city', 'Oraș', 'required');
        $this->form_validation->set_rules('company_phone', 'Telefon', 'required');
        $this->form_validation->set_rules('company_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('company_date_registration', 'Data inregistrare', 'required');

        $logo = $_FILES;

        if ($this->form_validation->run() == TRUE) {

            $company = $this->Companies->getCompanyByCUI($this->input->post('company_cui', true));
            if (!$company) {
                $data = array(
                    'companies_name' => $this->input->post('company_name', true),
                    'companies_cui' => $this->input->post('company_cui', true),
                    'companies_email' => $this->input->post('company_email', true),
                    'companies_phone' => $this->input->post('company_phone', true),
                    'companies_address' => $this->input->post('company_address', true),
                    'companies_postal_code' => $this->input->post('company_postal_code', true),
                    'companies_cod_caen' => @$this->input->post('company_cod_caen', true) ? $this->input->post('company_cod_caen', true) : null,
                    'companies_date_registration_e_factura' => @$this->input->post('company_date_registration_e_factura', true) ? $this->input->post('company_date_registration_e_factura', true) : null,
                    'companies_date_registration' => @$this->input->post('company_date_registration', true) ? $this->input->post('company_date_registration', true) : null,
                    'companies_fax_number' => @$this->input->post('company_fax_number', true) ? $this->input->post('company_fax_number', true) : null,
                    'companies_iban' => @$this->input->post('company_iban', true) ? $this->input->post('company_iban', true) : null,
                    'companies_nr_reg_com' => @$this->input->post('company_nr_reg_com', true) ? $this->input->post('company_nr_reg_com', true) : null,
                    'companies_city' => $this->input->post('company_city', true),
                    'companies_link_facebook' => $this->input->post('company_link_facebook', true) ? $this->input->post('company_link_facebook', true) : null,
                    'companies_link_instagram' => $this->input->post('company_link_instagram', true) ? $this->input->post('company_link_instagram', true) : null,
                    'companies_link_twitter' => $this->input->post('company_link_twitter', true) ? $this->input->post('company_link_twitter', true) : null,
                    'companies_link_linkedin' => $this->input->post('company_link_linkedin', true) ? $this->input->post('company_link_linkedin', true) : null,
                    'companies_status' => 1,
                    'companies_added' => date('Y-m-d H:i:s'),
                    'companies_updated' => date('Y-m-d H:i:s'),
                );

                $id_company = $this->Companies->addCompany($data);

                if ($id_company) {

                    $data_to_insert_admin = array(
                        'ca_id_user' => $this->session->userdata('user_informations')["id_user"],
                        'ca_id_company' => $id_company,
                        'ca_created' => date('Y-m-d H:i:s'),
                    );

                    $rez = $this->Companies->addCompanyAdmin($data_to_insert_admin);

                    if ($logo) {
                        $this->adauga_logo($id_company, $logo);
                    }

                    if ($rez) {
                        $response->error = false;
                        $response->message = "Compania a fost adăugată cu succes!";
                    }
                } else {
                    $response->error = true;
                    $response->message = "A apărut o eroare la adăugarea companiei!";
                }
            } else {
                $response->error = true;
                $response->message = "Compania cu acest CUI există deja!";
            }
        } else {
            $response->error = true;
            $response->message = validation_errors();
        }

        header('Content-Type: application/json; charset=utf-8');
        http_response_code(200);
        echo json_encode($response);
    }

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

    //* Finante

    public function cauta_cui($cui)
    {
        $this->load->helper('finante');

        header('Content-Type: application/json; charset=utf-8');
        http_response_code(200);
        echo json_encode(cauta_cui($cui));
    }

    //* Logo

    private function adauga_logo($id_company, $logo)
    {
        //TODO !!!!
    }
}
