<?php 

class Home extends Controller {

    public function index() 
    {
        $data['title'] = 'Home';
        $data['subTitle'] = 'Dasboard';
        $data['admin'] = $this->model('Admin_model')->getAdmin();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }


    
}