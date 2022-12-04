<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcription extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LibraryModels/Subcription_model', 'sm');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['activeDash'] = '';
        $data['activeBook'] = '';
        $data['activeBorBook'] = '';
        $data['activeReturnBook'] = '';
        $data['activeMembers'] = '';
        $data['activeMemTrx'] = '';
        $data['activeLibrarian'] = '';
        $data['activeSubcrip'] = 'active';
        $data['title'] = 'Subcription Library';
        $data['style'] = 'subcription';
        $data['subcription'] = $this->sm->getAll();
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/Subcription/subcription', $data);
        $this->load->view('TemplateLibrary/footer');
    }

    public function addSubcription()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('title', 'TITLE', 'required');
            $this->form_validation->set_rules('month', 'MONTH', 'required');
            $this->form_validation->set_rules('price', 'PRICE', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'month' => $this->input->post('month'),
                    'price' => $this->input->post('price')
                );

                if ($this->sm->insertData($data)) {
                    echo "<script>
                    alert('SUCCESFULL ADDING DATA');
                    window.location.href = '" . base_url('Subcription') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED ADDING DATA');
                    window.location.href = '" . base_url('AddSubcription') . "';
                    </script>";
                }
            }
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = '';
            $data['activeBorBook'] = '';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = '';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = '';
            $data['activeSubcrip'] = 'active';
            $data['title'] = 'Add Subcription Library';
            $data['style'] = 'crud_subcription';
            $data['subcription'] = $this->sm->getAll();
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Subcription/subcriptionAdd', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function editSubcription($id = "")
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('title', 'TITLE', 'required');
            $this->form_validation->set_rules('month', 'MONTH', 'required');
            $this->form_validation->set_rules('price', 'PRICE', 'required');
            $this->form_validation->set_rules('is_active', 'IS ACTIVE', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'month' => $this->input->post('month'),
                    'price' => $this->input->post('price'),
                    'is_active' => $this->input->post('is_active')
                );

                $id_subs = $this->input->post('id');

                if ($this->sm->updateSaveData($data, $id_subs)) {
                    echo "<script>
                    alert('SUCCESFULL EDIT DATA');
                    window.location.href = '" . base_url('Subcription') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED EDIT DATA');
                    window.location.href = '" . base_url("Library/subcription/editSubcription/$id_subs") . "';
                    </script>";
                }
            }
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = '';
            $data['activeBorBook'] = '';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = '';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = '';
            $data['activeSubcrip'] = 'active';
            $data['title'] = 'Edit Subcription Library';
            $data['style'] = 'crud_subcription';
            $data['subs'] = $this->sm->getByID($id);
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Subcription/subcriptionEdit', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function deleteData($id)
    {
        if ($this->sm->deleteData($id)) {
            echo "<script>
            alert('DELETE SUCCESSFULL!!');
            window.location.href = '" . base_url('Subcription') . "'
            </script>";
        } else {
            echo "<script>
            alert('DELETE FAILED!!');
            window.location.href = '" . base_url('Subcription') . "'
            </script>";
        }
    }
}
