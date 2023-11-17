<?php
// Mendapatkan tanggal hari ini
$tanggal = date('d/m/Y'); // Format: YYYY-MM-DD
$TgInvoive = date('ydm');

?>
<style>
          .card-bg {
            background-image: url('<?= BASEURL; ?>/images/logoputih.png');
            background-color: white;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
  .card-header {
    font-size: large;
  }
  .table th {
    font-size: 14px;
    font-weight: 600;
  }

  .table td {
    font-size: 12px;
  }

  .dataTables_length {
    display: none;
  }
  .trans {
  background-color: rgba(255, 255, 255, 0.1); /* Putih dengan tingkat transparansi 70% */
}

  .dataTables_paginate {
    display: none;
  }

  .dataTables_info {
    display: none;
  }
  option {
    font-size: medium;
  }
  .table-invoice_filter,
  .dataTables_filter {
    display: none;
  }
</style>
<div class="row justify-content-center">
  <!-- Main content -->
  <div class="col-lg-3 d-print-none" >
    <div class="card mt-5">
      <div class="card-header bg-gradient-secondary">
      <div class="text-bold text-center">Grand Total = <span id="Semua"></span></div>
      </div>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <select class="form-select form-control" id="nama">
              <option>Pilih Nama Pegawai</option>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-5" for="hadir">Hadir</label>
          <div class="col-sm-7">
            <select class="form-control form-control-border border-width-2 select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="hadir">
              <option selected="selected">Pilih</option>
              <option value="0">Tidak hadir</option>
              <option value="10000">1 Hari</option>
              <option value="20000">2 Hari</option>
              <option value="30000">3 Hari</option>
              <option value="40000">4 Hari</option>
              <option value="50000">5 Hari</option>
              <option value="60000">6 Hari</option>
              <option value="70000">7 Hari</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-5" for="lembur">Lembur</label>
          <div class="col-sm-7">
            <select class="form-control form-control-border border-width-2 select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="lembur">
              <option selected="selected">Pilih</option>
              <option value="0">Tidak ada lembur</option>
              <option value="10000">1 X</option>
              <option value="20000">2 X</option>
              <option value="30000">3 X</option>
              <option value="40000">4 X</option>
              <option value="50000">5 X</option>
              <option value="60000">6 X</option>
              <option value="70000">7 X</option>
            </select>
          </div>
        </div>
        
      </div>
      <div class="card-footer">
        
      </div>
    </div>
  </div>
  <div class="col-lg-8 px-3">
    <div class="invoice p-3 mb-3 mt-5 card-bg">
      <!-- title row -->
      <div class="row trans">
        <div class="col-12">
          <h4>
            <img src="<?= BASEURL; ?>/images/logo.jpg" alt="sovana Logo" class="brand-image" style="opacity: .8" height="50" width="50"> SOVANABALI
            <small class="float-right">Date: <?= $tanggal; ?></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Supervisor, Inc.</strong><br>
            Jl. Gunung Tangkuban Perahu, <br>
            BUANA PERMAI, Blok 1/20<br>
            Phone: (62) 817-977-7607<br>
            Email: zack77@sovanabali.my.id
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <span class="text-bold text-capitalize" id="namaNya">John Doe</span><br>
            <span id="alamat">795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107</span>.<br>
            Phone: <span id="tlp">(555) 539-1037</span><br>
            Email:<span id="mail">john.doe@example.com</span>
          </address>
        </div>
        <!-- /.col -->

        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?= $TgInvoive; ?></b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> <?= $tanggal; ?><br>
          <b>Account:</b> 923-0<span id="idNya"></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row trans">
        <div class="col-12 table-responsive ">
          <table class="table table-striped bg-transparent" id="table-invoice">
            <thead>
              <tr>
                <th>Qty</th>
                <th class="col-sm-2">Item</th>
                <th class="col-sm-">Description</th>
                <th>Cost</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['invoice'] as $inv) : ?>
                <tr id="invKaryawan" data-qty="<?= $inv['qty']; ?>" data-item="<?= $inv['item']; ?>" data-description="<?= $inv['description']; ?>" data-cost="<?= $inv['cost']; ?>" data-total="<?= $inv['total']; ?>">
                  <td><?= $inv['qty']; ?></td>
                  <td><?= $inv['item']; ?></td>
                  <td><?= $inv['description']; ?></td>
                  <td><?= $inv['cost']; ?></td>
                  <td><?= $inv['total']; ?></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row trans">
        <!-- accepted payments column -->
        <div class="col-6 shadow-none justify-content-center">
          <p class="lead">Payment Methods:</p>
          <img src="<?= BASEURL; ?>/dist/img/credit/visa.png" alt="Visa">
          <img src="<?= BASEURL; ?>/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?= BASEURL; ?>/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?= BASEURL; ?>/dist/img/credit/paypal2.png" alt="Paypal">

          <div class="text-muted well well-sm " style="margin-top: 10px;">
          <img class="text-center" src="<?= BASEURL; ?>/images/ttd.png" alt="tanda tangan" width="200px" height="150px"><br>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="text-center">( Agus zakariya )</span>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <!-- <p class="lead">Amount Due 2/22/2014</p> -->

          <div class="table-responsive trans">
            <table class="table trans">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td class="" id="subTtl">2000000</td>
              </tr>
              <tr>
                <th>Tunjangan Hadir:</th>
                <td id="tHadir">100.000</td>
              </tr>
              <tr>
                <th>Tunjangan Lembur:</th>
                <td id="tLembur">0</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td id="gTotal"></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-12">
          <a href="#" rel="noopener" target="_blank" class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</a>
          <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
            Payment
          </button>
          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
            <i class="fas fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $.getJSON("<?= BASEAPI ?>/karyawan.php", function(data) {
      // Membuat opsi pilihan (select option) dengan nama pegawai
      var selectOptions = $("#nama");

      data.forEach(function(item) {
        selectOptions.append($('<option>', {
          value: item.nama,
          text: item.nama
        }));
      });
    });
    // $('#nama').on(change, function() {
    //   console.log('namanya')
    // })
    // $('body').addClass('sidebar-mini layout-fixed sidebar-closed sidebar-collapse');
    // $('.input').on('click', function() {
    //     $('#card-kiri').show('collapse');
    //     $('#card-kiri').addClass('animate__slideInRight');
    // });

    var apiData;
    $.getJSON("<?= BASEAPI; ?>/karyawan.php", function(data) {
      apiData = data;

      $('#nama').change(function() {
        var nm = $(this).val();
        
        var ny = $('#namaNya');
        ny = nm;

        var jab = "";
        var almt = "";
        var hp = "";
        var ml = "";
        var id = "";
        var idNya = $('#idNya');
        var jabatan = $('#jabatan');
        var alamat = $('#alamat');
        var phone = $('#tlp');
        var mail = $('#mail');
        $('#namaNya').text(ny);
        apiData.forEach(function(item) {
          if (item.nama === nm) {
            jab = item.jabatan;
            almt = item.alamat;
            hp = item.telepon;
            ml = item.email;
            id = item.id;
            jabatan.text(jab);
            alamat.text(almt);
            phone.text(hp);
            mail.text(ml);
            idNya.text(id);
          }
        });
      });
    });

    // var table = $('#table-invoice').DataTable({
    //   "columnDefs": [{
    //     "targets": [1],
    //     "searchable": true
    //   }]
    // });

    // var namane = $('#nama');
    var subTttl = $('#subTtl');

    function jumlahSubTtlNya() {
      var totalSum = 0;
      $('#table-invoice tbody tr').each(function() {
        var totalCell = $(this).find('td:eq(4)');
        var totalSubNya = parseInt(totalCell.text().replace(/\D/g, ''));
        totalSum += totalSubNya;
      });
      var formatJumlah = "Rp. " + totalSum.toLocaleString("id-ID");
      subTttl.text(formatJumlah);
    }
    jumlahSubTtlNya();

    $('#nama').change(function() {
      var selectedNama = $(this).val();
      var apiData;


// Fungsi untuk memuat data dari server
function loadData() {
    $.getJSON("<?= BASEAPI; ?>/invoice.php", function(data) {
        apiData = data;

        // Inisialisasi DataTable
        var table = $('#table-invoice').DataTable();

        // Event handler saat #nama berubah
        $('#nama').change(function() {
            var selectedNama = $(this).val();

            // Hapus filter yang ada
            table.search('').draw();

            // Terapkan filter pada kolom 'nama'
            table.column(1).search(selectedNama).draw();
        });
    });
}

// Memuat data saat halaman pertama kali dimuat
loadData();
    });

    var thd = $('#tHadir');
    var tlb = $('#tLembur');

    $('#hadir').on('change', function() {
      var hr = parseFloat($(this).val());
      thd.text('Rp. ' + hr.toLocaleString("id-ID"));
      hitungJumlahTotal();
    });

    $('#lembur').on('change', function() {
      var lb = parseFloat($(this).val());
      tlb.text('Rp. ' + lb.toLocaleString("id-ID"));
      hitungJumlahTotal();
    });

    function hitungJumlahTotal() {
      var subtotal = parseFloat($('#subTtl').text().replace(/\D/g, ''));
      var tunjanganHadir = parseFloat($('#tHadir').text().replace(/\D/g, ''));
      var tunjanganLembur = parseFloat($('#tLembur').text().replace(/\D/g, ''));

      var total = subtotal + tunjanganHadir + tunjanganLembur;
      
      $('#gTotal').text('Rp. ' + total.toLocaleString("id-ID"));
      $('#Semua').text('Rp. ' + total.toLocaleString("id-ID"));

    }
  });
</script>