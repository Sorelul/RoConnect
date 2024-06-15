<?php
class Companies_model extends CI_Model
{

    function getCompanyByUser($companies_admin)
    {
        $this->db->where('companies_admin', $companies_admin);
        $result = $this->db->get('companies', 1);
        return $result->row();
    }
}
