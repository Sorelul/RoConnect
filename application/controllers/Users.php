<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "USERS INDEX";
    }
}
