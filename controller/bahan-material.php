<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$bahan_material = "SELECT * FROM bahan_material ORDER BY id_bm DESC LIMIT 50";
$view_bahan_material = mysqli_query($conn, $bahan_material);
if (isset($_POST["add_bahan_material"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (bahan_material($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Bahan material baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: bahan-material");
    exit();
  }
}
if (isset($_POST["edit_bahan_material"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (bahan_material($conn, $validated_post, $action = 'update') > 0) {
    $message = "Bahan material " . $_POST['nama_materialOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: bahan-material");
    exit();
  }
}
if (isset($_POST["export_bahan_material"])) {
	$validated_post = array_map(function ($value) use ($conn) {
		return valid($conn, $value);
	}, $_POST);
	if (bahan_material($conn, $validated_post, $action = 'export') > 0) {
		$message = "Data bahan material berhasil di export.";
		$message_type = "success";
		alert($message, $message_type);
		header("Location: bahan-material");
		exit();
	}
}
if (isset($_POST["delete_bahan_material"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (bahan_material($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Bahan material " . $_POST['nama_material'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: bahan-material");
    exit();
  }
}
