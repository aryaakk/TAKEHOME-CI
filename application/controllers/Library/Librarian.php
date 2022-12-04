<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Librarian extends CI_Controller
{
    public const CONFIG_UPLOAD = [
        'upload_path' => FCPATH . "/assets/imgAvatar/",
        'allowed_types' => '*',
        'upload_max_filesize' => '1M',
        'overwrite' => true
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LibraryModels/Librarian_model', 'lm');
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
        $data['activeLibrarian'] = 'active';
        $data['activeSubcrip'] = '';
        $data['title'] = 'Librarians Library';
        $data['style'] = 'librarian';
        $data['librarian'] = $this->lm->getAll();
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/Librarians/librarian', $data);
        $this->load->view('TemplateLibrary/footer');
    }

    public function addLibrarian()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('username', 'USERNAME', 'required');
            $this->form_validation->set_rules('name', 'NAME', 'required');
            $this->form_validation->set_rules('email', 'EMAIL', 'required');
            $this->form_validation->set_rules('password', 'PASSWORD', 'required');
            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
            if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
                $this->upload->display_errors();
            } else {
                $file_name = $this->upload->data();
            }
            if ($this->form_validation->run() == TRUE) {
                $data['username'] = $this->input->post('username');
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['password'] =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data['avatar'] = $file_name['file_name'];
                if ($this->lm->insertData($data)) {
                    echo "<script>
                    alert('SUCCESFULL ADDING DATA');
                    window.location.href = '" . base_url('Librarians') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED ADDING DATA');
                    window.location.href = '" . base_url('AddLibrarians') . "';
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
            $data['activeLibrarian'] = 'active';
            $data['activeSubcrip'] = '';
            $data['title'] = 'Add Librarians Library';
            $data['style'] = 'crud_librarian';
            $data['librarian'] = $this->lm->getAll();
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Librarians/librarianAdd', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function editLibrarian($id = "")
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('username', 'USERNAME', 'required');
            $this->form_validation->set_rules('name', 'NAME', 'required');
            $this->form_validation->set_rules('email', 'EMAIL', 'required');
            $this->form_validation->set_rules('password', 'PASSWORD', 'required');
            if ($_FILES['avatar']['name'] == "") {
                if ($this->form_validation->run() == TRUE) {
                    $id_lib = $this->input->post('id');
                    $data['username'] = $this->input->post('username');
                    $data['name'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    if ($this->lm->updateSaveData($data, $id_lib)) {
                        echo "<script>
                    alert('SUCCESFULL EDIT DATA');
                    window.location.href = '" . base_url('Librarians') . "';
                    </script>";
                    } else {
                        echo "<script>
                    alert('FAILED EDIT DATA');
                    window.location.href = '" . base_url("Library/librarian/editLibrarian/$id_lib") . "';
                    </script>";
                    }
                }
            } else {
                $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
                if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
                    $this->upload->display_errors();
                } else {
                    $file_name = $this->upload->data();
                }

                if ($this->form_validation->run() == TRUE) {
                    $id_lib = $this->input->post('id');
                    $data['username'] = $this->input->post('username');
                    $data['name'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['password'] =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $data['avatar'] = $file_name['file_name'];
                    if ($this->lm->updateSaveData($data, $id_lib)) {
                        echo "<script>
                    alert('SUCCESFULL EDIT DATA');
                    window.location.href = '" . base_url('Librarians') . "';
                    </script>";
                    } else {
                        echo "<script>
                    alert('FAILED EDIT DATA');
                    window.location.href = '" . base_url("Library/librarian/editLibrarian/$id_lib") . "';
                    </script>";
                    }
                }
            }
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = '';
            $data['activeBorBook'] = '';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = '';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = 'active';
            $data['activeSubcrip'] = '';
            $data['title'] = 'Edit Librarians Library';
            $data['style'] = 'crud_librarian';
            $data['lib'] = $this->lm->getByID($id);
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Librarians/librarianEdit', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function deleteData($id)
    {
        $getId = $this->lm->getByID($id);
        $path = "./assets/imgAvatar/$getId->avatar";
        $this->lm->deleteData($id);
        if (unlink($path)) {
            echo "<script>
            alert('DELETE SUCCESSFULL!!');
            window.location.href = '" . base_url('Librarians') . "'
            </script>";
        } else {
            echo "<script>
            alert('DELETE FAILED!!');
            window.location.href = '" . base_url('Librarians') . "'
            </script>";
        }
    }
}
