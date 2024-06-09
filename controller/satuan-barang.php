<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$satuan_barang = "SELECT * FROM satuan_barang ORDER BY id_sb DESC LIMIT 50";
$view_satuan_barang = mysqli_query($conn, $satuan_barang);
if (isset($_POST["add_satuan_barang"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (satuan_barang($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Satuan barang baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: satuan-barang");
    exit();
  }
}
if (isset($_POST["edit_satuan_barang"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (satuan_barang($conn, $validated_post, $action = 'update') > 0) {
    $message = "Satuan barang " . $_POST['satuan_barangOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: satuan-barang");
    exit();
  }
}
if (isset($_POST["delete_satuan_barang"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (satuan_barang($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Satuan barang " . $_POST['satuan_barang'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: satuan-barang");
    exit();
  }
}
