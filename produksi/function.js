$(document).ready(function() {
    $('.kolom-kiri').hide(2000);
    
});
    
    function myFunction() {
    $('.kolom-kiri').show(1000);
    // $('#save').html('Simpan');
    if($('#customerNya').val() == '') {
        $('#tombol').hide();
    } else {
        $('#tombol').show()
    }
    if ($('#tanggalNya').val() == '') {
        $('#update').hide();
    } else {
        $('#update').show();
        $('#save').html('Tambahkan Data');

    }
    if($('#customerNya').keypress(function(){
            $('#tombol').show()
        }));
    // Kode atau aksi yang ingin Anda lakukan saat tombol diklik
    // alert("Tombol diklik!");
}

function editFunction() {
    $('#update').show();
    $('.kolom-kiri').show(1000);
}