<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Book extends CI_Controller
{
    public const CONFIG_UPLOAD = [
        'upload_path' => FCPATH . "/assets/imgCover/",
        'allowed_types' => '*',
        'upload_max_filesize' => '1M',
        // 'max_size' => 1000000000000,
        // 'max_width' => 4096,
        // 'max_height' => 4096,
        'overwrite' => true
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LibraryModels/Book_model', 'bm');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['activeDash'] = '';
        $data['activeBook'] = 'active';
        $data['activeBorBook'] = '';
        $data['activeReturnBook'] = '';
        $data['activeMembers'] = '';
        $data['activeMemTrx'] = '';
        $data['activeLibrarian'] = '';
        $data['activeSubcrip'] = '';
        $data['title'] = 'Book Library';
        $data['style'] = 'book';
        $data['ShowBook'] = $this->bm->getAll();
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/Books/book', $data);
        $this->load->view('TemplateLibrary/footer');
    }

    public function AddBook()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('isbn', 'ISBN', 'required');
            $this->form_validation->set_rules('title', 'TITLE', 'required');
            $this->form_validation->set_rules('synopsis', 'SYNOPSIS', 'required');
            $this->form_validation->set_rules('author', 'AUTHOR', 'required');
            $this->form_validation->set_rules('publisher', 'PUBLISER', 'required');
            $this->form_validation->set_rules('category', 'CATEGORY', 'required');
            $this->form_validation->set_rules('language', 'LANGUAGE', 'required');

            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
            if (isset($_FILES['cover_book']) && !$this->upload->do_upload('cover_book')) {
                var_dump($this->upload->display_errors());
            } else {
                $file_name = $this->upload->data();
            }

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'isbn' => $this->input->post('isbn'),
                    'title' => $this->input->post('title'),
                    'synopsis' => $this->input->post('synopsis'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'category' => $this->input->post('category'),
                    'language' => $this->input->post('language'),
                    'cover_book' => $file_name['file_name']
                );
                if ($this->bm->insertData($data)) {
                    echo "<script>
                    alert('SUCCESFULL ADDING DATA');
                    window.location.href = '" . base_url('Book') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED ADDING DATA');
                    window.location.href = '" . base_url('AddBook') . "';
                    </script>";
                }
            }
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = 'active';
            $data['activeBorBook'] = '';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = '';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = '';
            $data['activeSubcrip'] = '';
            $data['title'] = 'Add Book Library';
            $data['style'] = 'crud_book';
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/Books/bookAdd', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }

    public function editDirect($id)
    {
        $data['activeDash'] = '';
        $data['activeBook'] = 'active';
        $data['activeBorBook'] = '';
        $data['activeReturnBook'] = '';
        $data['activeMembers'] = '';
        $data['activeMemTrx'] = '';
        $data['activeLibrarian'] = '';
        $data['activeSubcrip'] = '';
        $data['title'] = 'Edit Book Library';
        $data['style'] = 'crud_book';
        $data['Book'] = $this->bm->getByID($id);
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/Books/bookEdit', $data);
        $this->load->view('TemplateLibrary/footer');
    }

    public function editBook()
    {
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('title', 'TITLE', 'required');
        $this->form_validation->set_rules('synopsis', 'SYNOPSIS', 'required');
        $this->form_validation->set_rules('author', 'AUTHOR', 'required');
        $this->form_validation->set_rules('publisher', 'PUBLISER', 'required');
        $this->form_validation->set_rules('category', 'CATEGORY', 'required');
        $this->form_validation->set_rules('language', 'LANGUAGE', 'required');

        if ($_FILES['cover_book']['name'] == "") {
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'isbn' => $this->input->post('isbn'),
                    'title' => $this->input->post('title'),
                    'synopsis' => $this->input->post('synopsis'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'category' => $this->input->post('category'),
                    'language' => $this->input->post('language')
                );
                $id = $this->input->post('id');
                if ($this->bm->updateSaveData($data, $id)) {
                    echo "<script>
                    alert('SUCCESFULL EDIT DATA');
                    window.location.href = '" . base_url('Book') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED EDIT DATA');
                    window.location.href = '" . base_url("Library/book/editDirect/$id") . "';
                    </script>";
                }
            }
        } else {
            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
            if (isset($_FILES['cover_book']) && !$this->upload->do_upload('cover_book')) {
                var_dump($this->upload->display_errors());
            } else {
                $file_name = $this->upload->data();
            }

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'isbn' => $this->input->post('isbn'),
                    'title' => $this->input->post('title'),
                    'synopsis' => $this->input->post('synopsis'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'category' => $this->input->post('category'),
                    'language' => $this->input->post('language'),
                    'cover_book' => $file_name['file_name']
                );
                $id = $this->input->post('id');
                if ($this->bm->updateSaveData($data, $id)) {
                    echo "<script>
                    alert('SUCCESFULL EDIT DATA');
                    window.location.href = '" . base_url('Book') . "';
                    </script>";
                } else {
                    echo "<script>
                    alert('FAILED EDIT DATA');
                    window.location.href = '" . base_url("Library/book/editDirect/$id") . "';
                    </script>";
                }
            }
        }
    }

    public function deleteData($id)
    {
        $getId = $this->bm->getByID($id);
        $path = "./assets/imgCover/$getId->cover_book";
        $this->bm->deleteData($id);
        if (unlink($path)) {
            echo "<script>
            alert('DELETE SUCCESSFULL!!');
            window.location.href = '" . base_url('Book') . "'
            </script>";
        } else {
            echo "<script>
            alert('DELETE FAILED!!');
            window.location.href = '" . base_url('Book') . "'
            </script>";
        }
    }
}
