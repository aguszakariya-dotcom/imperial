<?php

class Form_model
{
    private $table = 'karyawan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNomerUrut()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        return $this->db->resultSet();
    }
    public function getAllKaryawan()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getLimitProduksi()
    {
        $this->db->query('SELECT * FROM produksi ORDER BY id DESC LIMIT 50');
        return $this->db->resultSet();
    }
    public function getAllPoduksi()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        return $this->db->resultSet();
    }
    public function getAllGajian()
    {
        $this->db->query('SELECT * FROM gajian ORDER BY id DESC');
        return $this->db->resultSet();
    }


    public function tambahGajiKaryawan($data)
    {
        $nama = $data['nama'];
        $date = $data['tanggal'];
        $item = $data['style'];
        $description = implode(', ', [$data['customer'], $data['warna'], $data['size']]);
        $cost = $data['harga'];
        $qty = $data['qty'];
        $total = $data['total'];
        $query = "INSERT INTO gajian (nama, date, item, description, cost, qty, total)
        VALUES (
            :nama,
            :date,
            :item,
            :description,
            :cost,
            :qty,
            :total
        )";
        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('date', $date);
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
    public function hapusBreakdownSovana($id) {
        $query = "DELETE FROM invsovana WHERE id = :id";
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
