<?php 

class Produksi_model {
    private $table = 'produksi';
    private $db;
    public function __construct()
    {
        $this-> db = new Database;
    }

    public function getAllProduksi() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id DESC');
        return $this-> db-> resultSet();
    }
    public function getLimitProduksi() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id DESC LIMIT 7');
        return $this-> db-> resultSet();
    }
    public function newProduksi($data) {
        // Ambil semua data dari $data
        $finish = $data['bulan'];
        $cust = $data['nama_customer'];
        $style = $data['style'];
        $code = $data['code'];
        $bahan = $data['bahan'];
        $warna = $data['warna'];
        $size = $data['size'];
        $qty = $data['qty'];
        $harga = $data['harga'];
        $keterangan = $data['keterangan'];
        $jahit = $data['jahit'];
        $motong = $data['motong'];
        $naskat = $data['naskat'];
        $status = $data['status'];
        
        // Periksa apakah ada gambar baru yang diunggah
        if (isset($_FILES['gambar']['name']) && !empty($_FILES['gambar']['name'])) {
            // Proses upload gambar baru
            $gambar = $_FILES['gambar']['name'];
            $lokasi_simpan_gambar = '<?= BASEURL ?>/images/' . $gambar;
            move_uploaded_file($_FILES['gambar']['tmp_name'], $lokasi_simpan_gambar);
        } else {
            // Tidak ada gambar baru diunggah, gunakan gambarLama
            $gambar = $data['gambarLama'];
        }
    
        $query = "INSERT INTO produksi (bulan, nama_customer, style, code, bahan, warna, size, qty, gambar, harga, keterangan, jahit, motong, naskat, status)
                  VALUES (:bulan, :nama_customer, :style, :code, :bahan, :warna, :size, :qty, :gambar, :harga, :keterangan, :jahit, :motong, :naskat, :status)";
    
        $this->db->query($query);
        $this->db->bind('bulan', $finish);
        $this->db->bind('nama_customer', $cust);
        $this->db->bind('style', $style);
        $this->db->bind('code', $code);
        $this->db->bind('bahan', $bahan);
        $this->db->bind('warna', $warna);
        $this->db->bind('size', $size);
        $this->db->bind('qty', $qty);
        $this->db->bind('gambar', $gambar); // Menggunakan nilai gambar baru atau gambar lama
        $this->db->bind('harga', $harga);
        $this->db->bind('keterangan', $keterangan);
        $this->db->bind('jahit', $jahit);
        $this->db->bind('motong', $motong);
        $this->db->bind('naskat', $naskat);
        $this->db->bind('status', $status);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    
    

    public function hapusDataProduksi($id) {
        $query = "DELETE FROM produksi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        try {
            $this->db->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Tampilkan pesan error lengkap
            die(); // Hentikan eksekusi skrip
        }

        return $this->db->rowCount();
    }

    public function updateProduksi($id, $data) {
        $finish = $data['bulan'];
        $cust = $data['nama_customer'];
        $style = $data['style'];
        $code = $data['code'];
        $bahan = $data['bahan'];
        $warna = $data['warna'];
        $size = $data['size'];
        $qty = $data['qty'];
        $gambar = $data['gambar'];
        $harga = $data['harga'];
        $keterangan = $data['keterangan'];
        $jahit = $data['jahit'];
        $motong = $data['motong'];
        $naskat = $data['naskat'];
        $status = $data['status'];
    
        $query = "UPDATE produksi SET
            bulan = :bulan,
            style = :style,
            code = :code,
            bahan = :bahan,
            warna = :warna,
            size = :size,
            qty = :qty,
            gambar = :gambar,
            harga = :harga,
            keterangan = :keterangan,
            jahit = :jahit,
            motong = :motong,
            naskat = :naskat,
            status = :status
            WHERE id = :id";
    
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('bulan', $finish);
        $this->db->bind('nama_customer', $cust);
        $this->db->bind('style', $style);
        $this->db->bind('code', $code);
        $this->db->bind('bahan', $bahan);
        $this->db->bind('warna', $warna);
        $this->db->bind('size', $size);
        $this->db->bind('qty', $qty);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('harga', $harga);
        $this->db->bind('keterangan', $keterangan);
        $this->db->bind('jahit', $jahit);
        $this->db->bind('motong', $motong);
        $this->db->bind('naskat', $naskat);
        $this->db->bind('status', $status);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    

}