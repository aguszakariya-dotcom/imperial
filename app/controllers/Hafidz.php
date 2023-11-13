<?php 

class Hafidz extends Controller {
    public function index() {
        $data['title'] = 'Extras';
        $data['subTitle'] = 'Hafidz';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('hafidz/index', $data);
        $this->view('templates/footer2', $data);
    }
}