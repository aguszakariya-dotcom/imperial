<?php 

class About {
    public function index($nama = 'agus zakariya', $pekerjaan = 'penjahit', $umur = 40)
    {
        echo " Halo saya disini, nama saya $nama, saya adalah seorang $pekerjaan, saya berumur $umur tahun.";
    }

    public function page() 
    {
        echo 'About/page';
    }
}