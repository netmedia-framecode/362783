<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/auth.php");
if (isset($_SESSION["project_mitra_agung_malaka"])) {
  unset($_SESSION["project_mitra_agung_malaka"]);
  header("Location: ./");
  exit();
}
