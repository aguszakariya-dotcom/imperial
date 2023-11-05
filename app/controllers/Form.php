<?php 
class Form extends Controller {
    public function index() {
        $data['title'] = 'Forms';
        $data['subTitle'] = 'Salary Karyawan';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('invoice/index',$data);
        $this->view('templates/footer');
    }
    public function data_produksi() {
        $data['title'] = 'Forms Input Data';
        $data['subTitle'] = 'Input Data Produksi';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['produksi'] = $this->model('Produksi_model')->getAllProduksi();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('form/data_produksi',$data);
        $this->view('templates/footer2', $data);
    }
    public function data_sample() {
        $data['title'] = 'Forms Input Data';
        $data['subTitle'] = 'Input Data Sample';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('form/data_sample',$data);
        $this->view('templates/footer2', $data);
    }
    // Forms Salary
    public function salary_tailor() {
        $data['title'] = 'Forms Salary';
        $data['subTitle'] = 'Salary Tailor';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('form/salary_tailor', $data);
        $this->view('templates/footer2', $data);
    }
    public function salary_naskat() {
        $data['title'] = 'Forms Salary';
        $data['subTitle'] = 'Salary Naskat';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('form/salary_naskat', $data);
        $this->view('templates/footer2', $data);
    }
    public function salary_tkPotong() {
        $data['title'] = 'Forms Salary';
        $data['subTitle'] = 'Salary Tk Potong';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('form/salary_tkpotong', $data);
        $this->view('templates/footer2', $data);
    }
}