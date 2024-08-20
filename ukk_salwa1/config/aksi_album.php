<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES(' ', '$namaalbum', '$deskripsi', '$tanggal', '$userid')");

    if ($sql) {
        echo "<script>
        alert('Data berhasil ditambah');
        window.location.href = '../admin/album.php';
        </script>";
}

}

if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];  // Pastikan albumid didefinisikan
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi', tanggal='$tanggal' WHERE albumid='$albumid'");

    if ($sql) {
        echo "<script>
        alert('Data berhasil diperbaharui');
        window.location.href = '../admin/album.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal memperbaharui data: " . mysqli_error($koneksi) . "');
        window.location.href = '../admin/album.php';
        </script>";
    }
}



if (isset($_POST['hapus'])) {
    $albumid = $_POST['albumid'];
    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = '../admin/album.php';
        </script>";
    }


?>