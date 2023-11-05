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

    public function tambahProduksi() {
        if( $this->model('Produksi_model')->newProduksi($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'info');
            header('location: ' . BASEURL . '/form/data_produksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/form/data_produksi');
            exit;            
        }
    }

    public function hapus($id) {
        $result = $this->model('Produksi_model')->hapusDataProduksi($id);
        if ($result === 0) {
            Flasher::setFlash('gagal', 'dihapus: ' . $result, 'danger');
        } else {
            Flasher::setFlash('berhasil', 'dihapus', 'info');
        }
        header('location: ' . BASEURL . '/form/data_produksi');
        exit;
    }

    public function updateProduksi($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'bulan' => $_POST['bulan'],
                'nama_customer' => $_POST['nama_customer'],
                'style' => $_POST['style'],
                'code' => $_POST['code'],
                'bahan' => $_POST['bahan'],
                'warna' => $_POST['warna'],
                'size' => $_POST['size'],
                'qty' => $_POST['qty'],
                'gambar' => $_POST['gambar'],
                'harga' => $_POST['harga'],
                'keterangan' => $_POST['keterangan'],
                'jahit' => $_POST['jahit'],
                'motong' => $_POST['motong'],
                'naskat' => $_POST['naskat'],
                'status' => $_POST['status']
            ];
    
            if ($this->model('produksiModel')->updateProduksi($id, $data) > 0) {
                Flasher::setFlash('berhasil', 'diperbarui', 'info');
                header('location: ' . BASEURL . '/form/data_produksi');
                exit;
            } else {
                Flasher::setFlash('gagal', 'diperbarui', 'danger');
                header('location: ' . BASEURL . '/form/data_produksi');
                exit;
            }
        } else {
            // Jika bukan metode POST, mungkin tampilkan formulir pengeditan di sini.
            // Anda dapat mengambil data berdasarkan $id dan menampilkannya pada formulir.
            $data = $this->model('produksiModel')->getProduksiById($id);
            $this->view('produk/edit', $data);
        }
    }
    
}