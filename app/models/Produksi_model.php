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


}