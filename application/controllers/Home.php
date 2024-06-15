<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('template/header', array('title' => "Home page"));
        $this->load->view('home/view');
        $this->load->view('template/footer');
    }
}
