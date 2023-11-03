<?php 

class Home extends Controller {
    
    public function index() {
        $data['title'] = 'Dasboard';
        $data['subTitle'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['produksi'] = $this->model('Produksi_model')->getLimitProduksi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar2', $data);
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
}
