<?php

$messageTypes = ["success", "info", "warning", "danger", "dark"];

if (!isset($_SESSION["project_mitra_agung_malaka"]["users"])) {
  if (isset($_SESSION["project_mitra_agung_malaka"]["time_message"]) && (time() - $_SESSION["project_mitra_agung_malaka"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_mitra_agung_malaka"]["message_$type"])) {
        unset($_SESSION["project_mitra_agung_malaka"]["message_$type"]);
      }
    }
    unset($_SESSION["project_mitra_agung_malaka"]["time_message"]);
  }
} else if (isset($_SESSION["project_mitra_agung_malaka"]["users"])) {
  if (isset($_SESSION["project_mitra_agung_malaka"]["users"]["time_message"]) && (time() - $_SESSION["project_mitra_agung_malaka"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_mitra_agung_malaka"]["users"]["message_$type"])) {
        unset($_SESSION["project_mitra_agung_malaka"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_mitra_agung_malaka"]["users"]["time_message"]);
  }
}
