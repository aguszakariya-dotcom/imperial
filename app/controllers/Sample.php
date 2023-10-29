<?php 

class Sample extends Controller {
    public function index() {
        $data['title'] = 'Tables';
        $data['subTitle'] = 'Produksi';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['produksi'] = $this->model('Produksi_model')->getAllProduksi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar2', $data);
        $this->view('sample/index', $data);
        $this->view('templates/footer', $data);
    }
}