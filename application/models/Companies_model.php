<?php
class Companies_model extends CI_Model
{

    function getAllCompanies($city = null, $search_term = null)
    {
        if ($city) {
            $this->db->where('companies_city', $city);
        }

        if ($search_term) {
            $this->db->like('companies_name', $search_term);
            $this->db->or_like('companies_email', $search_term);
            $this->db->or_like('companies_cui', $search_term);
        }

        $this->db->join('cities', 'cities.id_city = companies.companies_city', 'left');

        $result = $this->db->get('companies');
        return $result->result();
    }

    function getCompanyByCUI($companies_cui)
    {
        $this->db->where('companies_cui', $companies_cui);
        $result = $this->db->get('companies', 1);
        return $result->row();
    }

    function addCompany($data)
    {
        $this->db->insert('companies', $data);
        return $this->db->insert_id();
    }

    //* Company Admins

    function addCompanyAdmin($data)
    {
        $this->db->insert('companies_admins', $data);
        return $this->db->insert_id();
    }


    //! ---------------------- CITIES ---------------------- !//

    function getCityById($id_city)
    {
        $this->db->where('id_city', $id_city);
        $result = $this->db->get('cities', 1);
        return $result->row();
    }
}
