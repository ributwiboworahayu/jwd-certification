<?php

function openDb(){
  try {
    $dbh = new \PDO($GLOBALS["connString"], $GLOBALS["dbUsername"], $GLOBALS["dbPassword"]);
    $dbh->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    return $dbh;
  } catch (\PDOException $e) {
    //echo "Error: " . $e->getMessage();
    return null;
  }
}
