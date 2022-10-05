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
  <?php
  $dbh = openDb();
  $result = null;
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  $data = [$id];
  try {
    $sql = "SELECT * FROM pemesanan WHERE id=?;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  } catch (\PDOException $e) {
    return false;
  } finally {
    $dbh = null;
  }

  if (count($result) > 0) {
    foreach ($result as $column) {
      echo '<div class="container shadow-lg mt-4 p-4">
              <h2 class="text-center">TIKET</h2>';
      echo '  <table class="table-striped">';
      echo '    <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <td>' . $column["nama"] . '</td>
                  </tr>';
      echo '    <tr>
                    <th>Tanggal Berangkat</th>
                    <th>:</th>
                    <td>' . $column["tgl"] . '</td>
                  </tr>';
      echo '    <tr>
                    <th>Kelas</th>
                    <th>:</th>
                    <td>' . $column["jns_kursi"] . '</td>
                  </tr>';
      echo '    <tr>
                    <th>Jumlah Penumpang</th>
                    <th>:</th>
                    <td>' . $column["jml_penumpang"] . '</td>
                  </tr>';
      echo '    <tr>
                    <th>Total Pembayaran</th>
                    <th>:</th>
                    <td>Rp. ' . $column["total_harga"] . '</td>
                  </tr>';
      echo '  </table>';
      echo '</div>';
    }
  } else {
    echo '<div class="container shadow-lg mt-4 p-4">
              <h4 class="text-center">Terjadi Kesalahan</h4>
            </div>';
  }

  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>