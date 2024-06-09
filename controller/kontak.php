<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$kontak = "SELECT * FROM kontak ORDER BY id_kontak DESC";
$views_kontak = mysqli_query($conn, $kontak);
if (isset($_POST["delete_kontak"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kontak($conn, $validated_post, $action = 'delete', $_POST['pesan']) > 0) {
    $message = "Pesan berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kontak");
    exit();
  }
}
