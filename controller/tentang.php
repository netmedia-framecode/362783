<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$tentang = "SELECT * FROM tentang ORDER BY id_tentang DESC";
$views_tentang = mysqli_query($conn, $tentang);
if (isset($_POST["edit_tentang"])) {
  if (tentang($conn, $_POST, $action = 'update') > 0) {
    $message = "Deskripsi tentang berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: tentang");
    exit();
  }
}
