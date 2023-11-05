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
    public function getAllKaryawan() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id DESC');
        return $this-> db-> resultSet();
    }


}