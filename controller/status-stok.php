<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$status_stok = "SELECT * FROM status_stok ORDER BY id_ss DESC LIMIT 50";
$view_status_stok = mysqli_query($conn, $status_stok);
if (isset($_POST["add_status_stok"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (status_stok($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Status stok baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: status-stok");
    exit();
  }
}
if (isset($_POST["edit_status_stok"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (status_stok($conn, $validated_post, $action = 'update') > 0) {
    $message = "Status stok " . $_POST['statusOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: status-stok");
    exit();
  }
}
if (isset($_POST["delete_status_stok"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (status_stok($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Status stok " . $_POST['status'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: status-stok");
    exit();
  }
}
