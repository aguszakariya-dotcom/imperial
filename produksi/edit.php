<?php 

if(isset($_GET['p'])) {
    if($_GET['p'] == "ubah") {
    $id = $_GET['id'];
        $sa = mysqli_query($koneksi, "SELECT * FROM produksi WHERE id = '$_GET[id]'");
        $row = mysqli_fetch_assoc($sa);
        if($row) {
            $pbulan = $row['bulan'];
            $pnama_customer = $row['nama_customer'];
            $pcode = $row['code'];
            $pstyle = $row['style'];
            $pbahan = $row['bahan'];
            $pwarna = $row['warna'];
            $psize = $row['size'];
            $pqty = $row['qty'];
            $pgambar = $row['gambar'];
            $pharga = $row['harga'];
            $pketerangan = $row['keterangan'];
            $pjahit = $row['jahit'];
            $pmotong = $row['motong'];
            $pnaskat= $row['naskat'];
            $pstatus = $row['status'];
        }
    }elseif (isset($_GET['p']) == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM produksi WHERE id = '$_GET[id]'");
        if ($hapus) {
            $_SESSION['sukses'] = "data berhasil dihapus";
            echo'<script>window.location.href="produksi.php";
            </script>';
        } else {
            $_SESSION['gagal']= "Data gagal di hapus";
            echo'<script>window.location.href="produksi.php";
            </script>';
        }
    }
}
if(isset($_POST['save'])) {
    if(saveProduksi($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Disimpan!';
        echo'<script>window.location.href="produksi.php";</script>';
    } else {
        $_SESSION['gagal']= 'Data Gagal Disimpan!';
        '<script>window.location.href="produksi.php";</script>';
    }
}
if(isset($_POST['update'])) {
    if(updateProduksi($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Diubah!';
        echo'<script>window.location.href="produksi.php";</script>';
    } else {
        $_SESSION['gagal'] = 'Data Gagal Diubah!';
        '<script>window.location.href="produksi.php";</script>';
    }
}
