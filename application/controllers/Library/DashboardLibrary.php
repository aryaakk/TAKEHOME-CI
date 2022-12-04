<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardLibrary extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LibraryModels/DashLibrary_model', 'dashModels');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['countMembers'] = $this->dashModels->getCountMembers();
        $data['countBook'] = $this->dashModels->getCountBook();
        $data['countBorrBook'] = $this->dashModels->getCountBorrBook();
        $data['countLibrarian'] = $this->dashModels->getCountLibrarian();
        $data['activeDash'] = 'active';
        $data['activeBook'] = '';
        $data['activeBorBook'] = '';
        $data['activeReturnBook'] = '';
        $data['activeMembers'] = '';
        $data['activeMemTrx'] = '';
        $data['activeLibrarian'] = '';
        $data['activeSubcrip'] = '';
        $data['title'] = 'Dashboard Library';
        $data['style'] = 'dashboard';
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/DashboardLibrary', $data);
        $this->load->view('TemplateLibrary/footer');
    }
}
