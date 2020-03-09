<?php
session_start();
require_once 'koneksi.php';

function query($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
}
return $rows;
}

function hapusPhoto($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM photo WHERE id = $id");
    return mysqli_affected_rows($connect);
}

$id = $_GET['id'];

if (hapusPhoto($id) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'upload.php'; 
    </script>";
} else {
    echo "<script>
    alert('Gagal dihapus');
    document.location.href = 'upload.php'; 
    </script>";
}
