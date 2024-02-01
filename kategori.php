<?php
    if($id != ""){
        $hapus = $dbo->delete('tbkategori','idkategori='.$id);
        if($hapus){
            ?>
                <script>
                    alert('hapus berhasil');
                    location.href='?hal=kategori';
                </script>
            <?php
        }
    }
?>
<div class="judul">
    <a href="?hal=add_kategori" class="btn-add"><i class="fa fa-plus"></i>Tambah Data</a>
    <div class="keterangan">Data Kategori</div>
</div>
<div class="data">
    <table border=1 cellpadding="0" cellspacing="0">
        <tr>
            <td>No</td>
            <td>Nama Kategori</td>
            <td>Edit</td>
            <td>Hapus</td>
        </tr>
        <?php
            $no=1;
            $data = $dbo->select('tbkategori');
            foreach($data as $row){
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['kategori']?></td>
                        <td>
                            <a class="btn-edit" href="?hal=edit_kategori&id=<?=$row['idkategori']?>"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a onclick="return confirm('Yaking Akan Dihapus')"class="btn-hapus" href="?hal=kategori&id=<?=$row['idkategori']?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
</div>