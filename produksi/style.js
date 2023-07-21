
$(document).ready(function(){
    
    if($('#customerNya').val() == '') {
        $('#tombol').hide()
        $('#importSample').hide()
    }else{
        $('#importSample').show()
        $('#tombol').show()
    }
        if($('#customerNya').keyup(function(){
            $('#tombol').show()
        }));
    $('#tbProduksi').DataTable();
    
    // $('#editSample').click(function(){
    //     $('save').hide()
    //     $('#tbSample').DataTable().ajax.reload()
    // })
})

