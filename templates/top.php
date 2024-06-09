<!DOCTYPE html>
<html lang="zxx" style="scroll-behavior: smooth;">

<head>
  <?php require_once("sections/head.php"); ?>
</head>

<body>
  <?php foreach ($messageTypes as $type) {
    if (isset($_SESSION["project_pemetaan_toko_roti"]["message_$type"])) {
      echo "<div class='message-$type' data-message-$type='{$_SESSION["project_pemetaan_toko_roti"]["message_$type"]}'></div>";
    }
  } ?>

  <!-- LOAD PAGE -->
  <div class="animationload">
    <div class="loader"></div>
  </div>

  <!-- BACK TO TOP SECTION -->
  <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

  <!-- HEADER -->
  <?php require_once("sections/nav.php"); ?>