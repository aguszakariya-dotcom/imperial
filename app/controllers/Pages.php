<?php 

class Pages extends Controller {
    public function index() {
        $data['title'] = 'Animasi | Pojok Media';
        $data['subTitle'] = 'Animasi';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/index', $data);
        $this->view('templates/footer2', $data);
    }
    public function karyawan() {
        $data['title'] = 'List';
        $data['subTitle'] = 'Karyawan';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/karyawan', $data);
        $this->view('templates/footer2');
    }
}