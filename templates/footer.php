

<script>
        feather.replace();
    </script>

<!-- <footer class=" bg-dark text-center fixed-bottom mt-2">
    <div class="my-1  text-white">
        <p>&copy; 2023 SOVANA WORKSHOP. All rights reserved. | Created By: zack77</p>
    </div>
</footer> -->

<script>
    $(document).ready(function() {
        $('#table-data').DataTable();

        img1.onchange = function() {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById("tampil1").src = reader.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
        img2.onchange = function() {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById("tampil2").src = reader.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>