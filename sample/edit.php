<?php 

if (isset($_GET['s'])) {
    if ($_GET['s'] == "ubah") {
        $id = $_GET['id'];
        $sa = mysqli_query($koneksi, "SELECT * FROM sample WHERE id = '$_GET[id]'");
        $row = mysqli_fetch_assoc($sa);
        if ($row) {
            $vnama_customer = $row['nama_customer'];
            $vtanggal = $row['tanggal'];
            // $vtahun = $row['tahun'];
            $vstyle = $row['style'];
            $vcode = $row['code'];
            $vwarna = $row['warna'];
            $vsize = $row['size'];
            $vharga = $row['harga'];
            $vhabis = $row['habis'];
            $vacc_1 = $row['acc_1'];
            $vacc_2 = $row['acc_2'];
            $vketerangan = $row['keterangan'];
            $vgambar = $row['gambar'];
            $vgambar2 = $row['gambar2'];
        }
    } elseif (isset($_GET['s']) == "hapusSample") {
        $hapus = mysqli_query($koneksi, "DELETE FROM sample WHERE id = '$_GET[id]'");
        if ($hapus) {
            $_SESSION['sukses'] = "Data berhasil dihapus";
            echo '<script>
                    Swal.fire({
                        position: "top-start",
                        icon: "success",
                        title: "'. $_SESSION['sukses'] .'",
                        showConfirmButton: false,
                        timer: 1500,
                        
                    });
                </script>';
        } else {
            $_SESSION['gagal'] = "Data gagal dihapus";
            echo '<script>
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "'. $_SESSION['gagal'] .'",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>';
        }
    }
}


if (isset($_POST['update'])) {
    if (updateSample($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Diupdate!';
        
    } else {
        $_SESSION['gagal'] = 'Data Gagal Diubah!';
        
    }
}

if (isset($_POST['save'])) {
    if (saveSample($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "'. $_SESSION['sukses'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).;
            </script>';
    } else {
        $_SESSION['gagal'] = 'Data Gagal Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "'. $_SESSION['gagal'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).;
            </script>';
    }
}

if (isset($_POST['savePro'])) {
    if (saveProduksi($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "'. $_SESSION['sukses'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "produksi.php";
                });
            </script>';
    } else {
        $_SESSION['gagal'] = 'Data Gagal Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "'. $_SESSION['gagal'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).;
            </script>';
    }
}
?>

