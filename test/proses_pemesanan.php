<?php
include_once  "config/config.php";
include_once  "config/connection.php";

if (isset($_POST)) {
    $data = [
        $_POST["nama"], $_POST["tanggal"], $_POST["jk"], $_POST["jenis_kursi"],
        $_POST["harga"], $_POST["jumlah_penumpang"], $_POST["total"]
    ];
    $dbh = openDb();
    $isSaved = false;
    try {
        $sql = "INSERT INTO pemesanan VALUES(null,?,?,?,?,?,?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
        $isSaved = true;
    } catch (\PDOException $e) {
        print_r($e);
        $isSaved = false;
    } finally {
        $dbh = null;
    }

    if ($isSaved) {
        setAlert("Data berhasil disimpan ", "success");
    } else {
        setAlert("Data gagal disimpan", "danger");
    }
} else {
    setAlert("Anda tidak memiliki akses", "danger");
}

header("location:data_pemesanan.php");
