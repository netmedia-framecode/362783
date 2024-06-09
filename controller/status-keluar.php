<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$status_keluar = "SELECT * FROM status_keluar ORDER BY id_sk DESC LIMIT 50";
$view_status_keluar = mysqli_query($conn, $status_keluar);
if (isset($_POST["add_status_keluar"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (status_keluar($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Status keluar baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: status-keluar");
    exit();
  }
}
if (isset($_POST["edit_status_keluar"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (status_keluar($conn, $validated_post, $action = 'update') > 0) {
    $message = "Status keluar " . $_POST['status_keluarOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: status-keluar");
    exit();
  }
}
if (isset($_POST["delete_status_keluar"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (status_keluar($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Status keluar " . $_POST['status_keluar'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: status-keluar");
    exit();
  }
}
