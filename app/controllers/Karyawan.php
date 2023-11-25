<?php 
class Karyawan extends Controller {
    
    public function index() {
        $data['title'] = 'Karyawan';
        $data['subTitle'] = ' | Data karyawan';
        $data['nama'] = $this->model('User_model')->getUser();
        // $data['produksi'] = $this->model('Produksi_model')->getLimitProduksi();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('karyawan/index', $data);
        $this->view('templates/footer2', $data);
    }
}