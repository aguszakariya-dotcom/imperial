// Function to fetch data from the API and process it
function fetchDataAndProcess() {
    fetch("http://localhost/api/produksi/")
      .then((response) => response.json())
      .then((data) => {
        // Step 1: Calculate jumlahData (total rows)
        const jumlahData = data.length;
        console.log("Jumlah Data:", jumlahData);
  
        // Step 2: Create an array to store unique nama_customer
        const uniqueCustomers = [];
  
        // Step 3: Build HTML table with unique nama_customer
        let tableHTML = "<table>";
        tableHTML += "<thead><tr><th>No.</th><th>Customer</th></tr></thead>";
        tableHTML += "<tbody>";
  
        data.forEach((item, index) => {
          if (!uniqueCustomers.includes(item.nama_customer)) {
            uniqueCustomers.push(item.nama_customer);
  
            tableHTML += `<tr><td>${index + 1}</td><td>${item.nama_customer}</td></tr>`;
          }
        });
  
        tableHTML += "</tbody></table>";
  
        // Display the table on the HTML page using jQuery
        $("#customerTable").html(tableHTML);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  }
  
  // Call the fetchDataAndProcess function to start the data retrieval and processing
  fetchDataAndProcess();

  $("#happyClientsCount").attr("data-purecounter-end", totalUniqueCustomers);
  new PureCounter(document.getElementById("happyClientsCount"), { duration: 1 }).start();