<?php
include_once  "config/config.php";
include_once  "config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
  <div class="container shadow-lg mt-4 p-4">
    <h2 class="text-center">DATA PEMESANAN</h2>
    <p>
      <a href="/" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> Kembali Kemenu Utama</a>
      <a href="form_pemesanan.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Pemesanan Baru</a>
    </p>
    <?= showAlert() ?>

    <?php
    $dbh = openDb();
    $result = null;
    try {
      $sql = "SELECT * FROM pemesanan ORDER BY id DESC;";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      return false;
    } finally {
      $dbh = null;
    }

    echo '<table class="table table-hover table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Tanggal Berangkat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Jenis Kursi</th>
                <th scope="col">Jumlah Penumpang</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
          <tbody>';

    if (count($result) > 0) {
      $no = 1;
      foreach ($result as $column) {
        $jkelamin = "Laki-laki";
        if ($column["jk"] == "P") {
          $jkelamin = "Perempuan";
        }
        echo '<tr>
            <th scope="row">' . $no . '</th>
            <td>' . $column["nama"] . '</td>
            <td>' . $column["tgl"] . '</td>
            <td>' . $jkelamin . '</td>
            <td>' . $column["jns_kursi"] . '</td>
            <td>' . $column["jml_penumpang"] . '</td>
            <td>' . $column["total_harga"] . '</td>
            <td align="right">
            <a href="cetak.php?id=' . $column["id"] . '" type="button" class="btn btn-success" title="Cetak" target="_blank"><i class="bi bi-printer"></i></a>
            </td>5
            <td align="right">
              <a href="#" type="button" class="btn btn-success" ><i class="bi-trash"></i></a>
            </td>
          </tr>';
        $no++;
      }
    } else {
      echo '  <tr>
            <th scope="row" colspan="8">Data masih kosong</th>    
          </tr>';
    }
    echo ' </tbody></table>';

    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>