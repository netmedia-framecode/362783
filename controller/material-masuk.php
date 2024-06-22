<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$bahan_material = "SELECT * FROM bahan_material ORDER BY id_bm DESC";
$view_bahan_material = mysqli_query($conn, $bahan_material);
$status_stok = "SELECT * FROM status_stok ORDER BY id_ss DESC";
$view_status_stok = mysqli_query($conn, $status_stok);
$satuan_barang = "SELECT * FROM satuan_barang ORDER BY id_sb DESC";
$view_satuan_barang = mysqli_query($conn, $satuan_barang);
$sopir = "SELECT * FROM sopir ORDER BY id_sopir DESC";
$view_sopir = mysqli_query($conn, $sopir);
$material_masuk = "SELECT stok_material.*, bahan_material.nama_material, status_stok.status, satuan_barang.satuan_barang, sopir.nama_sopir, sopir.no_plat
  FROM stok_material 
  JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm 
  JOIN status_stok ON stok_material.id_ss = status_stok.id_ss 
  JOIN satuan_barang ON stok_material.id_sb = satuan_barang.id_sb 
  JOIN sopir ON stok_material.id_sopir = sopir.id_sopir 
  ORDER BY stok_material.id_sm DESC LIMIT 50
";
$view_material_masuk = mysqli_query($conn, $material_masuk);
if (isset($_POST["add"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (material_masuk($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Data barang masuk baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: material-masuk");
    exit();
  }
}
if (isset($_POST["edit"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (material_masuk($conn, $validated_post, $action = 'update') > 0) {
    $message = "Data barang masuk " . $_POST['nama_material'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: material-masuk");
    exit();
  }
}
if (isset($_POST["delete"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (material_masuk($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Data barang masuk " . $_POST['nama_material'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: material-masuk");
    exit();
  }
}
