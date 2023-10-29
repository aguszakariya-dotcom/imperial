<?php 


class Sample_model {
    private $table = 'sample';
    private $db;
    public function __construct()
    {
        $this-> db = new Database;
    }

    public function getAllSample() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id DESC');
        return $this-> db-> resultSet();
    }


}