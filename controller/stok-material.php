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
$stok_material = "SELECT stok_material.*, bahan_material.nama_material, status_stok.status, satuan_barang.satuan_barang
  FROM stok_material 
  JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm 
  JOIN status_stok ON stok_material.id_ss = status_stok.id_ss 
  JOIN satuan_barang ON stok_material.id_sb = satuan_barang.id_sb 
  ORDER BY stok_material.id_sm DESC LIMIT 50
";
$view_stok_material = mysqli_query($conn, $stok_material);
if (isset($_POST["edit_stok_material"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (stok_material($conn, $validated_post, $action = 'update') > 0) {
    $message = "Stok material " . $_POST['nama_material'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: stok-material");
    exit();
  }
}
if (isset($_POST["export_stok_material"])) {
	$validated_post = array_map(function ($value) use ($conn) {
		return valid($conn, $value);
	}, $_POST);
	if (stok_material($conn, $validated_post, $action = 'export') > 0) {
		$message = "Data stok material berhasil di export.";
		$message_type = "success";
		alert($message, $message_type);
		header("Location: stok-material");
		exit();
	}
}
if (isset($_POST["delete_stok_material"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (stok_material($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Stok material " . $_POST['nama_material'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: stok-material");
    exit();
  }
}
