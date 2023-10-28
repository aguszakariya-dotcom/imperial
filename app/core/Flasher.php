<?php 

class Flasher {

    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] =[
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function setErrorFlash($pesan, $aksi, $tipe) {
        $_SESSION['error_flash'] =[
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Data <strong>' . $_SESSION['flash']['pesan'] . '</strong>' . $_SESSION['flash']['aksi'] . '
          </div>';
        } elseif (isset($_SESSION['error_flash'])) {
            echo '<div class="alert alert-' . $_SESSION['error_flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Error: <strong>' . $_SESSION['error_flash']['pesan'] . '</strong>' . $_SESSION['error_flash']['aksi'] . '
          </div>';
        }
        unset($_SESSION['flash']);
        unset($_SESSION['error_flash']);
    }
}
