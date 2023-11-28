<?php
  function tgl_kita($tanggal) {
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
      5 =>   "Jum",
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- <script src="../js/swal.js"></script> -->
    <style>
      body {
        /* font-size: 13px; */
        font-family: 'Times New Roman', Times, serif;
        /* background-image: url('https://img.freepik.com/free-vector/abstract-colorful-technology-dotted-wave-background_1035-17450.jpg'); */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        /* background-color: #111; */
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
      }

    </style>
</head>
<body>