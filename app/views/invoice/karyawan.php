<?php
// Mendapatkan tanggal hari ini
$tanggal = date('d/m/Y'); // Format: YYYY-MM-DD
$TgInvoive = date('ydm');

?>
<div class="row justify-content-center">
  <!-- Main content -->
  <div class="col-lg-3">
    <div class="card mt-5">
      <div class="card-header">
        Input Nama karyawan
      </div>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <select class="form-select form-control" name="nama" id="nama">
              <option>Pilih Nama Pegawai</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-sm-3 col-form-label">Hadir</label>
          <div class="col-sm-9">
            <input class="form-control" name="hadir" id="hadir">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-sm-3 col-form-label">Lembur</label>
          <div class="col-sm-9">
            <input class="form-control" name="lembur" id="lembur">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-sm-3 col-form-label">Total</label>
          <div class="col-sm-9">
            <input class="form-control" name="hadir" id="hadir">
          </div>
        </div>

        <div class="col-12 row">

        </div>
        <div class="col-sm-8">

        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 px-3">
    <div class="invoice p-3 mb-3  bg-white mt-5">
      <!-- title row -->
      <div class="row">
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
            <strong>John Doe</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?= $TgInvoive; ?></b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> <?= $tanggal; ?><br>
          <!-- <b>Account:</b> 968-0 <?= $noUrut; ?> -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Qty</th>
                <th>Product</th>
                <th>Serial #</th>
                <th>Description</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Call of Duty</td>
                <td>455-981-221</td>
                <td>El snort testosterone trophy driving gloves handsome</td>
                <td>$64.50</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Need for Speed IV</td>
                <td>247-925-726</td>
                <td>Wes Anderson umami biodiesel</td>
                <td>$50.00</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Monsters DVD</td>
                <td>735-845-642</td>
                <td>Terry Richardson helvetica tousled street art master</td>
                <td>$10.70</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Grown Ups Blue Ray</td>
                <td>422-568-642</td>
                <td>Tousled lomo letterpress</td>
                <td>$25.99</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>
          <img src="<?= BASEURL; ?>/dist/img/credit/visa.png" alt="Visa">
          <img src="<?= BASEURL; ?>/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?= BASEURL; ?>/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?= BASEURL; ?>/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
            plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td class="" id="subTtl">2000000</td>
              </tr>
              <tr>
                <th>Tunjangan Hadir:</th>
                <td id="tHadir">100000</td>
              </tr>
              <tr>
                <th>Tunjangan Lembur:</th>
                <td id="tLembur">100000</td>
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
          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
    $('#nama').on(change, function() {
      console.log('namanya')
    })
    // $('body').addClass('sidebar-mini layout-fixed sidebar-closed sidebar-collapse');
    // $('.input').on('click', function() {
    //     $('#card-kiri').show('collapse');
    //     $('#card-kiri').addClass('animate__slideInRight');
    // });

    // var apiData;
    // $.getJSON("<?= BASEAPI; ?>/karyawan.php", function(data) {
    //     apiData = data;

    //     var ny = $('#namaNya');
    //     $('#nama').on('change', function() {
    //         var nm = $(this).val();
    //         ny.text(nm);

    //         var jab = "";
    //         var almt = "";
    //         var hp = "";
    //         var ml = "";
    //         var id ="";
    //         var idNya = $('#idNya');
    //         var jabatan = $('#jabatan');
    //         var alamat = $('#alamat');
    //         var phone = $('#tlp');
    //         var mail = $('#mail');

    //         apiData.forEach(function(item) {
    //             if(item.nama === nm) {
    //                 jab = item.jabatan;
    //                 almt = item.alamat;
    //                 hp = item.telepon;
    //                 ml = item.email;
    //                 id = item.id;
    //                 jabatan.text(jab);
    //                 alamat.text(almt);
    //                 phone.text(hp);
    //                 mail.text(ml);
    //                 idNya.text(id);
    //             }
    //         });
    //     });
    // });

    // var table = $('#table-faktur').DataTable({
    //     "columnDefs": [{
    //         "targets": [1],
    //         "searchable": false
    //     }]
    // });

    // var namane = $('#nama');
    var subTttl = $('#subTtl');

    // function jumlahSubTtlNya() {
    //     var totalSum = 0;
    //     $('#tableFaktur tbody tr').each(function() {
    //         var totalCell = $(this).find('td:eq(4)');
    //         var totalSubNya = parseInt(totalCell.text().replace(/\D/g, ''));
    //         totalSum += totalSubNya;
    //     });
    //     var formatJumlah = "Rp. " + totalSum.toLocaleString("id-ID");
    //     subTttl.text(formatJumlah);
    // }
    // jumlahSubTtlNya();

    // $("#nama").on("change", function() {
    //     var nm = $(this).val();
    //     namane.val(nm);
    //     hitungJumlahTotal(); // Hitung ulang total saat filter berubah
    // });

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
    }
  });
</script>