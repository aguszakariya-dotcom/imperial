<?php 
session_start();
include './koneksi.php';



$ttlSample = mysqli_query($koneksi, "SELECT COUNT(*) AS totalSample FROM sample");
// $result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($ttlSample); // Menggunakan mysqli_fetch_assoc untuk mengambil hasil query sebagai array asosiatif
$totalSample = $data['totalSample'];
$query = "SELECT COUNT(DISTINCT nama_customer) AS totalCustomer FROM sample";
// Step 3: Execute the query and fetch the result
$result = mysqli_query($koneksi, $query);
// Step 4: Handle any potential errors
if (!$result) {
    die('Query error: ' . mysqli_error($koneksi));
}
$row = mysqli_fetch_assoc($result);
$totalCustomer = $row['totalCustomer'];
$ttlRwProduksi = mysqli_query($koneksi, "SELECT COUNT(*) AS totalRowProduksi FROM produksi");
$ttlDProduksi = mysqli_query($koneksi, "SELECT SUM(qty) AS totalDataProduksi FROM produksi");

$rowProduksi = mysqli_fetch_assoc($ttlRwProduksi);
$dataProduksi = mysqli_fetch_array($ttlDProduksi);

$jumlahRowProduksi = $rowProduksi['totalRowProduksi'];
$jumlahDataProduksi = $dataProduksi['totalDataProduksi'];

?>

<!DOCTYPE html>
<html lang="en">

<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="./css/swal.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap5.min.css">
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/swal.js"></script>
  <style>
    
    body {
      font-family: 'Poppins', sans-serif;
      font-size: smaller;
      /* background-image: url('<?= $background['image']; ?>'); */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-color: #111;
      margin: 0;
      padding: 0;
      width: 100%;
    }
    .kotak {
        position: relative;
            /* Gambar latar belakang */
            background-image: url('./images/R.png');
            /* Atur ukuran kotak */
            width: 200px;
            height: 200px;
            /* Atur posisi teks di tengah kotak */
            /* margin-top: 200px; */
            display: block;
            /* flex-direction: column; */
            justify-content: center;
            align-items: center;
            /* Style tambahan */
            color: #17a2b8;
            font-size: 16px;
            font-weight: bold;
            z-index: 1;
        }
  </style>
</head>

<body style="background-image: url(./templates/images/<?= $bg_img; ?>);">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img class="img-brand" src="./templates/images/bismillah.png" alt="Bismillah" style="height: 40px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
        <ul class="navbar-nav text-info">
          <li class="nav-item <?= (strpos($title, 'Home') !== false) ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">
              <i class="feather" data-feather="home"></i> Home
            </a>
          </li>
          <li class="nav-item <?= (strpos($title, 'Sample') !== false) ? 'active' : ''; ?>">
            <a class="nav-link" href="sample.php">
              <i class="feather" data-feather="file-text"></i> Sample
            </a>
          </li>
          <li class="nav-item <?= (strpos($title, 'Produksi') !== false) ? 'active' : ''; ?>">
            <a class="nav-link" href="produksi.php">
              <i class="feather" data-feather="box"></i> Produksi
            </a>
          </li>
          <li class="nav-item <?= (strpos($title, 'Salary') !== false) ? 'active' : ''; ?>">
            <a class="nav-link" href="salary.php">
              <i class="feather" data-feather="dollar-sign"></i> Salary
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  function tgl_kita($tanggal)
  {
    $bulan = array(
      1 =>   'Jan',
      2 =>   'Feb',
      3 =>   'Mar',
      4 =>   'Apr',
      5 =>   'Mei',
      6 =>   'Jun',
      7 =>   'Jul',
      8 =>   'Agu',
      9 =>   'Sep',
      10 =>  'Okt',
      11 =>  'Nov',
      12 =>  'Des'
    );
    $hari = array(
      1 =>   'Sen',
      2 =>   'Sel',
      3 =>   'Rab',
      4 =>   'Kam',
      5 =>   "Jum'",
      6 =>   'Sab',
      7 =>   'Min'
    );
    $tgl = substr($tanggal, 8, 2);
    $bln = substr($tanggal, 5, 2);
    $thn = substr($tanggal, 0, 4);
    $bln = $bulan[(int) $bln];
    $hari = $hari[(int) date('N', strtotime($tanggal))];
    return $hari . ', ' . $tgl . ' ' . $bln . ' ' . $thn;
  }
  ?>



<?php if (isset($_SESSION['sukses'])) { ?>
    <script>
        Swal.fire({
            position: "top-start",
            icon: "success",
            title: "<?php echo $_SESSION['sukses']; ?>",
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = "sample.php";
        });
    </script>
    <?php unset($_SESSION['sukses']); ?>
<?php } ?>

<?php if (isset($_SESSION['gagal'])) { ?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "<?php echo $_SESSION['gagal']; ?>",
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = "sample.php";
        });
    </script>
    <?php unset($_SESSION['gagal']); ?>
<?php } ?>


