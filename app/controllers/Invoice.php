<?php 

class Invoice extends Controller {
    public function index() {
        $data['title'] = 'Invoice';
        $data['subTitle'] = 'Karyawan';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('invoice/index',$data);
        $this->view('templates/footer');
    }
    public function karyawan() {
        $data['title'] = 'Invoice';
        $data['subTitle'] = 'Karyawan';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar2', $data);
        $this->view('invoice/karyawan',$data);
        $this->view('templates/footer2');
    }
}