<?php 

class Invoice_model {
    private $table = 'karyawan';
    private $db;

    public function __construct()
    {
        $this-> db = new Database;
    }

    public function getNomerUrut() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id DESC');
        return $this-> db-> resultSet();
    }
    public function getInvSovana() 
    {
        $today = date('d-M-Y');
        // Menggunakan klausa WHERE untuk membatasi hasil hanya pada tanggal hari ini
        $this->db->query('SELECT * FROM invsovana WHERE tanggal = :today ORDER BY id DESC');
        $this->db->bind(':today', $today);        
        return $this->db->resultSet();
    }
    

    public function tambahInvSovana($data)
    {
        $tanggal = $data['tanggal'];
        $item = $data['style'];
        $description = implode(', ', [$data['customer'], $data['warna'], $data['size']]);
        $cost = $data['harga'];
        $qty = $data['qty'];
        $total = $data['total'];
        $query = "INSERT INTO invsovana (tanggal, item, description, cost, qty, total)
        VALUES (            
            :tanggal,
            :item,
            :description,
            :cost,
            :qty,
            :total
        )";
        $this->db->query($query);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('item', $item);
        $this->db->bind('description', $description);
        $this->db->bind('cost', $cost);
        $this->db->bind('qty', $qty);
        $this->db->bind('total', $total);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDtGaji($id) {
        $query = "DELETE FROM gajian WHERE id = :id";
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

}