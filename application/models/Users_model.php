<?php
class Users_model extends CI_Model
{

    function authUser($user_email, $user_password)
    {
        $this->db->where('user_email', $user_email);
        $this->db->where('user_password', $user_password);
        $result = $this->db->get('users', 1);
        return $result->row();
    }

    function getUserInfo($id_user = null, $user_email = null)
    {
        if ($id_user != null) {
            $this->db->where('id_user', $id_user);
        } else if ($user_email != null) {
            $this->db->where('user_email', $user_email);
        } else {
            return false;
        }
        $result = $this->db->get('users', 1);
        return $result->row();
    }

    function getUserByEmail($user_email)
    {
        $this->db->where('user_email', $user_email);
        $result = $this->db->get('users', 1);
        return $result->row();
    }

    function updateUserInfo($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function getUserCompanies($id_user)
    {
        $this->db->join('companies', 'companies.id_company = companies_admins.ca_id_user');
        $this->db->join('companies_statuses', 'companies_statuses.id_company_status = companies.companies_status', 'left');
        $this->db->join('cities', 'cities.id_city = companies.companies_city', 'left');
        $this->db->where('ca_id_user', $id_user);
        $result = $this->db->get('companies_admins');
        return $result->result();
    }

    function getAllUsers($status = null)
    {
        if ($status != null) {
            $this->db->where('users.user_status', $status);
        }
        $result = $this->db->get('users');
        return $result->result();
    }

    function getUserByRole($role)
    {

        $this->db->where('user_role', $role);
        $this->db->where('user_status', "active");
        $result = $this->db->get('users');
        return $result->result();
    }

    function addUser($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function deleteUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }

    function updateUser($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function getUserByRecoveryKey($recovery_key)
    {
        $this->db->where('recovery_key', $recovery_key);
        $result = $this->db->get('users', 1);
        return $result->row();
    }
}
