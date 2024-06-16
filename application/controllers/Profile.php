<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        isAuth();
        $this->load->model('Users_model', 'Users');
    }

    //!-------------------------------------------------------------------------
    //!--------------------------------- VIEWS --------------------------------
    //!-------------------------------------------------------------------------

    public function index()
    {
        $id_user = $this->session->userdata('user_informations')['id_user'];
        $user_info = $this->Users->getUserInfo($id_user);
        if ($user_info) {

            $companies = $this->Users->getUserCompanies($id_user);

            $data = array(
                'user_info' => $user_info,
                'companies' => $companies
            );

            $this->load->view('template/header', array('title' => $user_info->user_name));
            $this->load->view('profile/view', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->sess_destroy();
            redirect('auth/login');
        }
    }


    //!-------------------------------------------------------------------------
    //!------------------------------- ACTIONS ---------------------------------
    //!-------------------------------------------------------------------------

    public function update()
    {
        $response = new stdClass();
        $id_user = $this->session->userdata('user_informations')['id_user'];

        if ($id_user) {
            $postData = $this->input->post(NULL, TRUE);
            foreach ($postData as $key => $value) {
                if (empty($value)) {
                    unset($postData[$key]);
                }
            }

            $res = $this->Users->updateUserInfo($id_user, $postData);

            if ($res > 0) {
                $response->error = false;
                $response->message = "Informațiile au fost actualizate cu succes!";
            } else {
                $response->error = true;
                $response->message = "Informațiile nu au fost actualizate!";
            }
        } else {
            $response->error = true;
            $response->message = "Utilizatorul nu este autentificat!";
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function update_password()
    {
        $response = new stdClass();
        $id_user = $this->session->userdata('user_informations')['id_user'];

        if ($id_user) {
            $postData = $this->input->post(NULL, TRUE);

            foreach ($postData as $key => $value) {
                if (empty($value)) {
                    unset($postData[$key]);
                }
            }

            $user = $this->Users->getUserInfo($id_user);

            if ($user->user_password == md5(RO_CONNECT_SS . $this->input->post('old_password', TRUE))) {

                $new_password = $this->input->post('new_password', TRUE);
                $confirm_new_password = $this->input->post('confirm_new_password', TRUE);

                if ($new_password == $confirm_new_password) {

                    $res = $this->Users->updateUserInfo($id_user, array('user_password' => md5(RO_CONNECT_SS . $new_password)));

                    if ($res > 0) {
                        $response->error = false;
                        $response->message = "Parola a fost actualizată cu succes!";
                    } else {
                        $response->error = true;
                        $response->message = "Parola nu a fost actualizată!";
                    }
                } else {
                    $response->error = true;
                    $response->message = "Parolele nu se potrivesc!";
                }
            } else {
                $response->error = true;
                $response->message = "Parola veche nu este corectă!";
            }
        } else {
            $response->error = true;
            $response->message = "Utilizatorul nu este autentificat!";
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }


    public function upload_image($type)
    {
        //* $type - 1 = avatar | 2 = cover

        header('Content-Type: application/json; charset=utf-8');
        $response = new stdClass();

        $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|docx';
        $config['max_size']             = 10000;
        $config['max_width']            = 6000;
        $config['max_height']           = 8060;

        $name = $_FILES["image"]["name"];

        $extension = substr($name, strpos($name, "."));
        $name = substr($name, 0, strrpos($name, '.'));

        $id_user = $this->session->userdata('user_informations')['id_user'];

        $user = $this->Users->getUserInfo($id_user);

        if ($user) {
            if (isset($_FILES["image"])) {
                if ($type == 1) {
                    $config['upload_path'] = './uploads/users_avatars/';
                } else {
                    $config['upload_path'] = './uploads/users_backgrounds/';
                }

                $config["file_name"] = $name . '-' . date("Y-m-d_H-i-s") . "-" . rand(10, 99) . $extension;
            } else {
                die();
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("image")) {
                $response->error = true;
                $response->message = "Tipul sau dimensiunea fișierului nu este permisă. Fișierul nu a fost încărcat!";
            } else {
                $returned_data = $this->upload->data();
                $file_name = $returned_data["file_name"];

                $dataToUpdate = array();

                $user_informations = $this->session->userdata('user_informations');

                if ($type == 1) {
                    $dataToUpdate['user_avatar'] = $file_name;
                    $user_informations['user_avatar'] = $file_name;
                } else {
                    $dataToUpdate['user_background'] = $file_name;
                    $user_informations['user_background'] = $file_name;
                }

                $res_update = $this->Users->updateUser($id_user, $dataToUpdate);
                if ($res_update) {
                    $response->error = false;
                    $response->message = "Fișierul a fost încărcat cu succes!";
                    $response->logo = $file_name;
                } else {
                    $response->error = true;
                    $response->message = "Fișierul nu a fost încărcat!";
                }
            }
        } else {
            $response->error = true;
            $response->message = "Utilizatorul nu există!";
        }

        echo json_encode($response);
    }
}
