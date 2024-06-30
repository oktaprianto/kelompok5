<?php
include 'koneksi.php';

$act = $_GET['act'];

if ($act == 'insert') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notlp = $_POST['notlp'];
    $alamat = $_POST['alamat'];
    $tabungan = $_POST['tabungan'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    if ($npm == '' || $nama == '' || $email == '' || $notlp == '' || $alamat == '' || $tabungan == '' || $tanggal_daftar == '') {
        header('Location: data_anggota.php?view=tambah&e=bl');
    } else {
        $sqlInsert = "INSERT INTO anggota (npm, nama, email, no_tlp, alamat, tabungan, tanggal_daftar) VALUES ('$npm', '$nama', '$email', '$notlp', '$alamat', '$tabungan', '$tanggal_daftar')";
        $queryInsert = mysqli_query($konek, $sqlInsert);

        if ($queryInsert) {
            header('Location: data_anggota.php?e=sukses');
        } else {
            header('Location: data_anggota.php?e=gagal');
        }
    }
} elseif ($act == 'update') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notlp = $_POST['notlp'];
    $alamat = $_POST['alamat'];
    $tabungan = $_POST['tabungan'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    if ($npm == '' || $nama == '' || $email == '' || $notlp == '' || $alamat == '' || $tabungan == '' || $tanggal_daftar == '') {
        header('Location: data_anggota.php?view=edit&id=' . $npm . '&e=bl');
    } else {
        $sqlUpdate = "UPDATE anggota SET nama='$nama', email='$email', no_tlp='$notlp', alamat='$alamat', tabungan='$tabungan', tanggal_daftar='$tanggal_daftar' WHERE npm='$npm'";
        $queryUpdate = mysqli_query($konek, $sqlUpdate);

        if ($queryUpdate) {
            header('Location: data_anggota.php?e=sukses');
        } else {
            header('Location: data_anggota.php?e=gagal');
        }
    }
} elseif ($act == 'del') {
    $npm = $_GET['id'];

    $sqlDelete = "DELETE FROM anggota WHERE npm='$npm'";
    $queryDelete = mysqli_query($konek, $sqlDelete);

    if ($queryDelete) {
        header('Location: data_anggota.php?e=sukses');
    } else {
        header('Location: data_anggota.php?e=gagal');
    }
}
?>
