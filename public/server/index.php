<?php
// Konfigurasi database lokal (localhost/phpmyadmin)
$local_host = 'localhost';
$local_username = 'root';
$local_password = '';
$local_database = 'local_akuntansi';

// Konfigurasi database hosting
$hosting_host = 'becik.my.id:3306';
$hosting_username = 'akuntansi_ok';
$hosting_password = '123/akuntansi';
$hosting_database = 'akuntansi';

// Mendeteksi lingkungan (misalnya, localhost atau hosting)
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $host = $local_host;
    $username = $local_username;
    $password = $local_password;
    $database = $local_database;
} else {
    $host = $hosting_host;
    $username = $hosting_username;
    $password = $hosting_password;
    $database = $hosting_database;
}

// Koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} else {
    echo ('Koneksi Sukses !');
}

// Ekspor database ke file SQL
$backup_file = 'backup_' . date("Ymd_His") . '.sql';
$command_export = "mysqldump --host=$host --user=$username --password=$password --databases $database > $backup_file";
exec($command_export);

// Impor file SQL ke database
$command_import = "mysql --host=$host --user=$username --password=$password $database < $backup_file";
exec($command_import);

// Tutup koneksi database
$koneksi->close();

echo "Data berhasil diganti dengan file backup $backup_file";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Database</title>
</head>
<body>

    <h2>Backup Database</h2>
    
    <!-- Form untuk memanggil skrip backup.php -->
    <form action="backup.php" method="post">
        <input type="submit" value="Backup dan Ganti Data">
    </form>

</body>
</html>
