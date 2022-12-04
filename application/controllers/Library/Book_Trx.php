<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_Trx extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LibraryModels/BookTrx_model', 'bookTrx');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['activeDash'] = '';
        $data['activeBook'] = '';
        $data['activeBorBook'] = 'active';
        $data['activeReturnBook'] = '';
        $data['activeMembers'] = '';
        $data['activeMemTrx'] = '';
        $data['activeLibrarian'] = '';
        $data['activeSubcrip'] = '';
        $data['title'] = 'Book Transaction Library';
        $data['style'] = 'trxs_book';
        $this->load->view('TemplateLibrary/header', $data);
        $this->load->view('ContentLibrary/BooksTrx/trxs_book', $data);
        $this->load->view('TemplateLibrary/footer');
    }

    public function addBookTrxs()
    {
        if ($this->input->method() == 'post') {
        } else {
            $data['activeDash'] = '';
            $data['activeBook'] = '';
            $data['activeBorBook'] = 'active';
            $data['activeReturnBook'] = '';
            $data['activeMembers'] = '';
            $data['activeMemTrx'] = '';
            $data['activeLibrarian'] = '';
            $data['activeSubcrip'] = '';
            $data['title'] = 'Add Transaction Library';
            $data['style'] = 'crud_trxs';
            $data['book_trx'] = $this->bookTrx->getAllJoin();
            $idBorr = $this->bookTrx->getAllJoin();
            $this->load->view('TemplateLibrary/header', $data);
            $this->load->view('ContentLibrary/BooksTrx/trxsAdd', $data);
            $this->load->view('TemplateLibrary/footer');
        }
    }
}
