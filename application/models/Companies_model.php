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

    function getCompanyByUser($companies_admin)
    {
        $this->db->where('companies_admin', $companies_admin);
        $result = $this->db->get('companies', 1);
        return $result->row();
    }




    //! ---------------------- CITIES ---------------------- !//

    function getCityById($id_city)
    {
        $this->db->where('id_city', $id_city);
        $result = $this->db->get('cities', 1);
        return $result->row();
    }
}
