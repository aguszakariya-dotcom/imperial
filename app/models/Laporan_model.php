<?php 

class Laporan_model {
    private $table = 'mutasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKas()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE namAkun2 = :namaAkun ORDER BY id DESC');
        $this->db->bind('namaAkun', 'Kas (cash)');
        return $this->db->resultSet();
    }
    public function kasBulanIni()
    {
        // Mendapatkan tanggal awal dan akhir bulan ini
        $tanggalAwal = date('Y-m-01');
        $tanggalAkhir = date('Y-m-t');
    
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE namAkun2 = :namAkun2 AND tanggal BETWEEN :tanggalAwal AND :tanggalAkhir ORDER BY id DESC');
        
        $this->db->bind('namAkun2', 'Kas (cash)'); // Perbaikan disini
        $this->db->bind('tanggalAwal', $tanggalAwal);
        $this->db->bind('tanggalAkhir', $tanggalAkhir);
        
        return $this->db->resultSet();
    }
    
    
    



}