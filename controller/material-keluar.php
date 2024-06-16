<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$status_keluar = "SELECT * FROM status_keluar ORDER BY id_sk ASC";
$view_status_keluar = mysqli_query($conn, $status_keluar);
$stok_material = "SELECT stok_material.*, bahan_material.nama_material, status_stok.status, satuan_barang.satuan_barang
  FROM stok_material 
  JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm 
  JOIN status_stok ON stok_material.id_ss = status_stok.id_ss 
  JOIN satuan_barang ON stok_material.id_sb = satuan_barang.id_sb 
  WHERE stok_material.jumlah != 0
  ORDER BY stok_material.id_sm DESC
";
$view_stok_material = mysqli_query($conn, $stok_material);
$material_keluar = "SELECT material_keluar.*, status_keluar.status_keluar, status_keluar.progress, bahan_material.nama_material, status_stok.status, satuan_barang.satuan_barang
  FROM material_keluar 
  JOIN stok_material ON material_keluar.id_sm = stok_material.id_sm 
  JOIN status_keluar ON material_keluar.id_sk = status_keluar.id_sk 
  JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm 
  JOIN status_stok ON stok_material.id_ss = status_stok.id_ss 
  JOIN satuan_barang ON stok_material.id_sb = satuan_barang.id_sb 
  ORDER BY material_keluar.id_mk DESC
";
$view_material_keluar = mysqli_query($conn, $material_keluar);
if (isset($_POST["add_material_keluar"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (material_keluar($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Data material telah keluar dari stok.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: material-keluar");
    exit();
  }
}
if (isset($_POST["edit_material_keluar"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (material_keluar($conn, $validated_post, $action = 'update') > 0) {
    $message = "Data material yang keluar " . $_POST['nama_material'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: material-keluar");
    exit();
  }
}
if (isset($_POST["export_material_keluar"])) {
	$validated_post = array_map(function ($value) use ($conn) {
		return valid($conn, $value);
	}, $_POST);
	if (material_keluar($conn, $validated_post, $action = 'export') > 0) {
		$message = "Data material keluar berhasil di export.";
		$message_type = "success";
		alert($message, $message_type);
		header("Location: material-keluar");
		exit();
	}
}
if (isset($_POST["delete_material_keluar"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (material_keluar($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Data material yang keluar " . $_POST['nama_material'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: material-keluar");
    exit();
  }
}
