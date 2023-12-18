<?php 

class Tahapan extends Controller {
    public function index() {
        $data['title'] = 'Tahapan | Pojok Media';
        $data['subTitle'] = 'Fendi';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tahapan/index', $data);
        $this->view('templates/footer2', $data);
    }
    public function fendi() {
        $data['title'] = 'Extras';
        $data['subTitle'] = 'Tahapan Fendi';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['fendi'] = $this->model('Tahapan_model')->getFendi();
        $data['fendiSaldo'] = $this->model('Tahapan_model')->getFendiSaldo();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tahapan/fendi', $data);
        $this->view('templates/footer2');
    }
    public function hafidz() {
        $data['title'] = 'Extras';
        $data['subTitle'] = 'Tahapan Hafidz';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['hafidz'] = $this->model('Tahapan_model')->getHafidz();
        $data['hafidzSaldo'] = $this->model('Tahapan_model')->getHafidzSaldo();
        $this->view('templates/header2', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tahapan/hafidz', $data);
        $this->view('templates/footer2');
    }

    public function tambahFendi() {
        if( $this->model('Tahapan_model')->tambahSaldoFendi($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'info');
            header('location: ' . BASEURL . '/tahapan/fendi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/tahapan/fendi');
            exit;
            
        }
    }
    public function tambahHafidz() {
        if( $this->model('Tahapan_model')->tambahSaldoHafidz($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'info');
            header('location: ' . BASEURL . '/tahapan/hafidz');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/tahapan/hafidz');
            exit;
            
        }
    }
}