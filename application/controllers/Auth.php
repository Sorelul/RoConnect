<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'Users');
        isNotAuth();
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        if ($this->input->method() == 'post') {

            $response = new stdClass();

            $user_email = strtolower($this->input->post('user_email', TRUE));
            $password = md5(RO_CONNECT_SS . $this->input->post('user_password', TRUE));

            $user_info = $this->Users->authUser($user_email, $password);

            if ($user_info) {
                $this->load->model('Companies_model', 'Companies');
                $company = $this->Companies->getCompanyByUser($user_info->id_user);

                $sesdata = array(
                    'logged_in'       =>  TRUE,
                    'id_user'       =>  $user_info->id_user,
                    'user_name'       =>  $user_info->user_name,
                    'user_email'      =>  $user_info->user_email,
                    'user_role'      =>  $user_info->user_role,
                    'user_avatar'   =>  $user_info->user_avatar,
                    'user_background'   =>  $user_info->user_background,
                    'user_color'   =>  $user_info->user_color,
                    'user_status'   =>  $user_info->user_status,
                    'user_admin'         => $user_info->user_is_admin,
                    'user_company' => @$company->id_company ? $company->id_company : null,
                );

                $this->session->set_userdata(array(
                    'user_informations' => $sesdata
                ));

                $response->error = false;
                $response->message = "Autentificare reusita!";
            } else {
                $response->error = true;
                $response->message = "Email sau parola incorecta!";
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $this->load->view('/auth/login');
        }
    }

    public function forgot_password()
    {
        if ($this->input->method() == 'post') {
        } else {
            $this->load->view('auth/forgot');
        }
    }

    public function register()
    {
        if ($this->input->method() == 'post') {

            $response = new stdClass();

            $username = $this->input->post('username', TRUE);
            $email = strtolower($this->input->post('email', TRUE));
            $password = md5(RO_CONNECT_SS . $this->input->post('password', TRUE));

            $user_info = $this->Users->getUserByEmail($email);

            if ($user_info) {
                $response->error = true;
                $response->message = "Email-ul este deja folosit!";
            } else {
                $data = array(
                    'user_name' => $username,
                    'user_email' => $email,
                    'user_password' => $password,
                    'user_role' => 'user',
                    'user_status' => 'active',
                    'user_is_admin' => 'N',
                    'user_avatar' => 'default.jpg',
                    'user_background' => 'b-default.jpg',
                    'user_color' => 'primary',
                    'user_created' => date('Y-m-d H:i:s'),
                    'user_updated' => date('Y-m-d H:i:s'),
                );

                $res = $this->Users->addUser($data);

                if ($res) {
                    $response->error = false;
                    $response->message = "Contul a fost creat cu succes!";
                } else {
                    $response->error = true;
                    $response->message = "A aparut o eroare la crearea contului!";
                }
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $this->load->view('auth/register');
        }
    }
}
