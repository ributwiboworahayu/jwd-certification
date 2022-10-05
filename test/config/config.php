<?php

$GLOBALS["dbServername"] = "localhost";
$GLOBALS["dbUsername"] = "root";
$GLOBALS["dbPassword"] = "";
$GLOBALS["dbName"] = "kai";
$GLOBALS["connString"] = "mysql:host=" . $GLOBALS["dbServername"] . ";dbname=" . $GLOBALS["dbName"];

function setAlert(string $message, string $type) {
  session_start();
  $_SESSION["alert_message"] = '
              <div class="alert alert-'. $type .' alert-dismissible fade show mt-3" role="alert">
              '.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            ';
}

function showAlert() {
  session_start();
  if(isset($_SESSION["alert_message"])){
    $result = $_SESSION["alert_message"];
    unset($_SESSION["alert_message"]);
    return $result;
  }
}
