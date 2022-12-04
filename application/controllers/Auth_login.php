<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'am');
    }

    public function index()
    {
        if ($this->session->logged_in == FALSE) {
            $this->load->view('template_login/header');
            $this->load->view('template_login/Signin');
        } else {
            echo "<script>
            alert('LOGIN SUCCESSFULL');
            window.location.href = '" . base_url('Dashboard') . "';
            </script>";
        }
    }

    public function postLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $status = $this->am->getDetail($email, password_hash($password, PASSWORD_DEFAULT));
        echo "console.log($status);";

        if ($status) {
            $session = array(
                'nama' => $status->username,
                'avatar' => $status->avatar,
                'email' => $email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session);
            $this->session->unset_userdata('gagal');
            redirect('LoginTH');
        } else {
            $session = array('gagal' => 1);
            $this->session->set_userdata($session);
            redirect('LoginTH');
        }
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
