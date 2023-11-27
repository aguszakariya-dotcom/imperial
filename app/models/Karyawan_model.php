<?php 
class Mutasi_model {
    private $table = 'karyawan';
    private $db;

    public function getAllKaryawan() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id DESC');
        return $this-> db-> resultSet();
    }

    public function getAllGajiKaryawan() 
    {
        $this-> db->query('SELECT * FROM daftar_gaji ORDER BY id DESC');
        return $this-> db-> resultSet();
    }
    
}