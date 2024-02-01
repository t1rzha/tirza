<div class="judul">
    <div class="keterangan">Data Transaksi</div>
</div>
<div class="data">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
        <?php 
             $no=1;
             $data = $dbo->select("tborders a, tbpelanggan b where a.idpelanggan = b.idpelanggan","a.*,b.nama_pelanggan");
             foreach($data as $row){
                $datatotal = $dbo->select("tborderdetail where idorder = ".$row['idorder']);
                $total = 0;
                foreach($datatotal as $rowtotal){
                    $total += $rowtotal['jumlah'] * $rowtotal['harga'];
                }
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row['tglorder']?></td>
                    <td><?=$row['nama_pelanggan']?></td>
                    <td><?=$total?></td>
                    <td>
                        <?php
                        if($row['total']==null){
                            ?>
                            <a href="?hal=bayar&id=<?=$row['idorder']?>">Bayar</a>
                            <?php
                        }else{
                            echo"Lunas";
                        }
                        ?>
                    </td>
                </tr>
                <?php

             }
        ?>
    </table>
</div>