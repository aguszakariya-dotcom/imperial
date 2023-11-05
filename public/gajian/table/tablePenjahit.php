<?php 

?>
<table id="dataTable" class="table table-hover  ">
                        <thead>
                            <tr class="fs-6">
                                <th>No.</th>
                                <th>Customer</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($query)): ?>
                            <tr class="table-row  text-light"
                                data-customer="<?php echo $row['nama_customer'                                ]; ?>"
                                data-style="<?php echo $row['style']; ?>" data-warna="<?= $row['warna'] ?>"
                                data-harga="<?php echo $row['jahit']; ?>"
                                data-code="<?php echo $row['code'];?>">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_customer']; ?></td>
                                <td><?php echo $row['style']; ?></td>
                                <td><?= $row['warna'] ?></td>
                                <td><?= $row['code']; ?></td>
                                <!-- <td><?= number_format($row['jahit'],0,',','.') ?></td> -->
                            </tr>
                            <?php endwhile;
                            ?>
                        </tbody>
                    </table>