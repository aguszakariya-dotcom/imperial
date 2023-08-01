// Fungsi untuk mengambil data dari API dan memprosesnya
function fetchDataDanProses() {
    fetch("http://api.becik.my.id/produksi/")
      .then((response) => response.json())
      .then((data) => {
        // Langkah 1: Hitung jumlahData (total baris)
        const jumlahData = data.length;
        console.log("Jumlah Data:", jumlahData);
  
        // Langkah 2: Buat array untuk menyimpan nama_customer yang unik
        const namaCustomerUnik = [];
  
        // Langkah 3: Bangun tabel HTML dengan nama_customer yang unik
        let tableHTML = "<table>";
        tableHTML += "<thead><tr><th>No.</th><th>Customer</th></tr></thead>";
        tableHTML += "<tbody>";
  
        data.forEach((item, index) => {
          if (!namaCustomerUnik.includes(item.nama_customer)) {
            namaCustomerUnik.push(item.nama_customer);
  
            tableHTML += `<tr><td>${index + 1}</td><td>${item.nama_customer}</td></tr>`;
          }
        });
  
        tableHTML += "</tbody></table>";
  
        // Tampilkan tabel pada halaman HTML menggunakan jQuery
        $("#customerTable").html(tableHTML);
  
        // Langkah 4: Hitung jumlahCustomer (total nama_customer yang unik)
        const jumlahCustomer = namaCustomerUnik.length;
        console.log("Jumlah Customer:", jumlahCustomer);
  
        // Langkah 5: Hitung jumlahProject (total QTY)
        const jumlahProject = data.reduce(
          (total, item) => total + parseInt(item.qty),
          0
        );
        console.log("Jumlah Project:", jumlahProject);
  
        // Tampilkan nilai yang dihitung pada elemen count-box
        $("#happyClientsCount").attr("data-purecounter-end", jumlahCustomer);
        $("#totalRowCount").attr("data-purecounter-end", jumlahData);
  
        // Inisialisasi plugin PureCounter untuk elemen-elemen yang memiliki kelas purecounter
        $(".purecounter").pureCounter();
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  }
  
  // Panggil fungsi fetchDataDanProses untuk memulai pengambilan dan pemrosesan data
  fetchDataDanProses();
  