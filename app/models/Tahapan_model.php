<?php

class Tahapan_model {
    private $table = 'cicilan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getFendi() 
    {
        $this-> db->query('SELECT * FROM ' . $this-> table . ' ORDER BY id ASC');
        return $this-> db-> resultSet();
    }
    public function getHafidz() 
    {
        $this-> db->query('SELECT * FROM hfd');
        return $this-> db-> resultSet();
    }

    public function getFendiSaldo() {
        $this->db->query('SELECT saldo FROM ' . $this-> table . ' ORDER BY id DESC LIMIT 1');
        return $this->db->single();
    }
    public function getHafidzSaldo() {
        $this->db->query('SELECT saldo FROM hfd ORDER BY id DESC LIMIT 1');
        return $this->db->single();
    }
    public function tambahSaldoFendi($data) {
        $tanggal = $data['tanggal'];
        $info = ucwords($data['keterangan']);
        $tarik = $data['tarik'];
        $setor = $data['setor'];
        $saldo = $data['saldo'];
        $query = "INSERT INTO cicilan VALUE (
            '',
            :tanggal,
            :info,
            :tarik,
            :setor,
            :saldo
        )";
        $this->db->query($query);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('info', $info);
        $this->db->bind('tarik', $tarik);
        $this->db->bind('setor', $setor);
        $this->db->bind('saldo', $saldo);
        $this->db->execute();
        return $this->db->rowCount();   
    }
    public function tambahSaldoHafidz($data) {
        $tanggal = $data['tanggal'];
        $tarik = $data['tarik'];
        $setor = $data['setor'];
        $saldo = $data['saldo'];
        $keterangan = ucwords($data['keterangan']);
        $query = "INSERT INTO hfd VALUE (
            '',
            :tanggal,
            :tarik,
            :setor,
            :saldo,
            :keterangan
        )";
        $this->db->query($query);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('tarik', $tarik);
        $this->db->bind('setor', $setor);
        $this->db->bind('saldo', $saldo);
        $this->db->bind('keterangan', $keterangan);
        $this->db->execute();
        return $this->db->rowCount();   
    }
}