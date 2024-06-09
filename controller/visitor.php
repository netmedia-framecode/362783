<?php

require_once("config/Base.php");
require_once("config/Alert.php");

$tentang = "SELECT * FROM tentang ORDER BY id_tentang DESC";
$views_tentang = mysqli_query($conn, $tentang);
$stok_material = "SELECT stok_material.*, bahan_material.nama_material, status_stok.status, satuan_barang.satuan_barang
  FROM stok_material 
  JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm 
  JOIN status_stok ON stok_material.id_ss = status_stok.id_ss 
  JOIN satuan_barang ON stok_material.id_sb = satuan_barang.id_sb 
  ORDER BY stok_material.id_sm DESC LIMIT 50
";
$view_stok_material = mysqli_query($conn, $stok_material);
if (isset($_POST["add_kontak"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kontak($conn, $validated_post, $action = 'insert', $_POST['pesan']) > 0) {
    $message = "Pesan anda berhasil dikirm.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: index#kontak");
    exit();
  }
}
