<?php
if (isset($_SESSION["project_mitra_agung_malaka"]["users"])) {
  header("Location: ../views/");
  exit;
}
