<?php 
include "header.php"; 
?>

<div class="container">

<?php 
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch ($view) {
    default:
        if(isset($_GET['e']) && $_GET['e']=='sukses'){
            ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Selamat</strong> Proses berhasil...!
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_GET['e']) && $_GET['e']=='gagal'){
        ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> Proses gagal dilakukan...!
                    </div>
                </div>
            </div>
        <?php
        } 
        ?>

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Data Anggota</strong></h3>
                </div>

                <div class="panel-body">
                    <a href="data_anggota.php?view=tambah" style="margin-bottom: 10px" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><center>No</center></th>
                            <th><center>NPM</center></th>
                            <th><center>Nama</center></th>
                            <th><center>Email</center></th>
                            <th><center>No. Tlp</center></th>
                            <th><center>Alamat</center></th>
                            <th><center>Tabungan</center></th>
                            <th><center>Tanggal Daftar</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                        <?php 
                        $sql = mysqli_query($konek, "SELECT * FROM anggota ORDER BY npm ASC");
                        $no=1;

                        while ($d=mysqli_fetch_array($sql)) {
                            echo "<tr>
                                <td width='40px' align='center'>$no</td>
                                <td>$d[npm]</td>
                                <td>$d[nama]</td>
                                <td>$d[email]</td>
                                <td>$d[no_tlp]</td>
                                <td>$d[alamat]</td>
                                <td>$d[tabungan]</td>
                                <td>$d[tanggal_daftar]</td>
                                <td width='160px' align='center'>
                                    <a class='btn btn-warning btn-sm' href='data_anggota.php?view=edit&id=$d[npm]'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='aksi_anggota.php?act=del&id=$d[npm]'>Hapus</a>
                                </td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <?php
        break;
    case "tambah":
        if(isset($_GET['e']) && $_GET['e']=='bl'){
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Peringatan</strong> form anda belum lengkap, silahkan lengkapi...!
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Anggota</h3>
                </div>

                <div class="panel-body">
                    <form method="post" action="aksi_anggota.php?act=insert">
                        <table class="table">
                            <tr>
                                <td width="160px">NPM</td>
                                <td>
                                    <input class="form-control" type="text" name="npm" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input class="form-control" type="text" name="nama" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input class="form-control" type="email" name="email" required>
                                </td>
                            </tr>
                            <tr>
                                <td>No. Tlp</td>
                                <td>
                                    <input class="form-control" type="text" name="notlp" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Tabungan</td>
                                <td>
                                    <input class="form-control" type="number" name="tabungan" step="0.01" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>
                                    <input class="form-control" type="date" name="tanggal_daftar" required>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                    <a class="btn btn-danger" href="data_anggota.php">Kembali</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>    
        </div>
        <?php
        break;
    case "edit":
        $sqlEdit = mysqli_query($konek, "SELECT * FROM anggota WHERE npm='$_GET[id]'");
        $e = mysqli_fetch_array($sqlEdit);
        ?>

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Data Anggota</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="aksi_anggota.php?act=update">
                        <table class="table">
                            <tr>
                                <td width="160">NPM</td>
                                <td>
                                    <input type="text" name="npm" class="form-control" value="<?php echo $e['npm']; ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $e['nama']; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" name="email" class="form-control" value="<?php echo $e['email']; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td>No. Tlp</td>
                                <td>
                                    <input type="text" name="notlp" class="form-control" value="<?php echo $e['no_tlp']; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control" name="alamat" required><?php echo $e['alamat']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Tabungan</td>
                                <td>
                                    <input class="form-control" type="number" name="tabungan" step="0.01" value="<?php echo $e['tabungan']; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>
                                    <input class="form-control" type="date" name="tanggal_daftar" value="<?php echo $e['tanggal_daftar']; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-primary" value="Update Data">
                                    <a class="btn btn-danger" href="data_anggota.php">Kembali</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>    
        </div>
        <?php
        break;
}
?>

</div>
<?php include "footer.php"; ?>
