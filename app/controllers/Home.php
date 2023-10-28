<?php 

class Home extends Controller {
    
    public function index() {
        $data['title'] = 'Dasboard';
        $data['subTitle'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
}
