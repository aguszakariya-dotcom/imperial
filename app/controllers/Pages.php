<?php 

class Pages extends Controller {
    public function index() {
        $data['title'] = 'Animasi | Pojok Media';
        $data['subTitle'] = 'Animasi';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pages/index',$data);
        $this->view('templates/footer');
    }
}