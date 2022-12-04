<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LibraryModels/Member_model', 'mm');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['activeDash'] = '';
        $data['activeBook'] = '';
        $data['activeBorBook'] = '';
        $data['activeReturnBook'] = '';
        $data['activeMembers'] = 'active';
        $data['activeMemTrx'] = '';
        $data['activeLibrarian'] = '';
        $data['activeSubcrip'] = '';
        $data['title'] = 'Member Library';
        $data['style'] = 'member';
        $data['member'] = $this->mm->getAll();
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/Members/member', $data);
        $this->load->view('TemplateLibrary/footer');
    }

    public function addMember()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('full_name', 'NAME', 'required');
            $this->form_validation->set_rules('phone', 'PHONE', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('born_place', 'BORN PLACE', 'required');
            $this->form_validation->set_rules('born_date', 'BORN DATE', 'required');
            $this->form_validation->set_rules('gender', 'GENDER', 'required');
            $this->form_validation->set_rules('country', 'COUNTY', 'required');
            $this->form_validation->set_rules('nationality', 'NATIONALITY', 'required');

            if($this->form_validation->run() == TRUE){
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'born_place' => $this->input->post('born_place'),
                    'born_date' => $this->input->post('born_date'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'nationality' => $this->input->post('nationality')
                );

                if ($this->mm->insertData($data)) {
                    echo "<script>
                    alert('SUCCESFULL ADDING DATA');
                    window.location.href = '" . base_url('Members') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED ADDING DATA');
                    window.location.href = '" . base_url('AddMembers') . "';
                    </script>";
                }
            }
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = '';
            $data['activeBorBook'] = '';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = 'active';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = '';
            $data['activeSubcrip'] = '';
            $data['title'] = 'Member Library';
            $data['style'] = 'crud_member';
            $data['gender'] = $this->mm->getEnumGender();
            $data['nation'] = $this->mm->getEnumNation();
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Members/memberAdd', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function editMember($id= ""){
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('full_name', 'NAME', 'required');
            $this->form_validation->set_rules('phone', 'PHONE', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('born_place', 'BORN PLACE', 'required');
            $this->form_validation->set_rules('born_date', 'BORN DATE', 'required');
            $this->form_validation->set_rules('gender', 'GENDER', 'required');
            $this->form_validation->set_rules('country', 'COUNTY', 'required');
            $this->form_validation->set_rules('nationality', 'NATIONALITY', 'required');
            $this->form_validation->set_rules('is_active', 'IS ACTIVE', 'required');

            if($this->form_validation->run() == TRUE){
                $data = array(
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'born_place' => $this->input->post('born_place'),
                    'born_date' => $this->input->post('born_date'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'nationality' => $this->input->post('nationality'),
                    'is_active' => $this->input->post('is_active')
                );

                $id_mem = $this->input->post('id');

                if ($this->mm->updateSaveData($data, $id_mem)) {
                    echo "<script>
                    alert('SUCCESFULL EDIT DATA');
                    window.location.href = '" . base_url('Members') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED EDIT DATA');
                    window.location.href = '" . base_url("Library/member/editMember/$id_mem") . "';
                    </script>";
                }
            }
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = '';
            $data['activeBorBook'] = '';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = 'active';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = '';
            $data['activeSubcrip'] = '';
            $data['title'] = 'Edit Member Library';
            $data['style'] = 'crud_member';
            $data['gender'] = $this->mm->getEnumGender();
            $data['nation'] = $this->mm->getEnumNation();
            $data['member'] = $this->mm->getByID($id);
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Members/memberEdit', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function deleteData($id)
    {
        if ($this->mm->deleteData($id)) {
            echo "<script>
            alert('DELETE SUCCESSFULL!!');
            window.location.href = '" . base_url('Members') . "'
            </script>";
        } else {
            echo "<script>
            alert('DELETE FAILED!!');
            window.location.href = '" . base_url('Members') . "'
            </script>";
        }
    }
}
