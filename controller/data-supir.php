<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$sopir = "SELECT * FROM sopir ORDER BY id_sopir DESC LIMIT 50";
$view_sopir = mysqli_query($conn, $sopir);
if (isset($_POST["add"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (sopir($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Sopir baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: data-supir");
    exit();
  }
}
if (isset($_POST["edit"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (sopir($conn, $validated_post, $action = 'update') > 0) {
    $message = "Sopir " . $_POST['nama_sopirOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: data-supir");
    exit();
  }
}
if (isset($_POST["delete"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (sopir($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Sopir " . $_POST['nama_sopir'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: data-supir");
    exit();
  }
}
