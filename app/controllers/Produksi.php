<?php 

class Produksi extends Controller {
    public function index() {
        $data['title'] = 'Tables';
        $data['subTitle'] = 'Produksi';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['produksi'] = $this->model('Produksi_model')->getAllProduksi();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('produksi/index', $data);
        $this->view('templates/footer2', $data);
    }
    public function pg() {
        $data['title'] = 'Tables';
        $data['subTitle'] = 'Produksi';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['produksi'] = $this->model('Produksi_model')->getAllProduksi();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('produksi/pg', $data);
        $this->view('templates/footer2', $data);
    }
}