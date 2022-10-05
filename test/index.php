<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JWD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><i class="bi bi-book"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menu (START) -->
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_pemesanan.php">Pemesanan</a>
          </li>
        </ul>

        <div class="navbar-nav navbar-nav-scroll navbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"></i>Suwanto Sanjaya
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
              <li><a class="dropdown-item" href="https://ribut.000webhostapp.com/login/auth"><i class="fa fa-lock"></i> Sign Out</a></li>
            </ul>
          </li>
        </div>

      </div>
    </div>
    <!-- Menu (END) -->
    </div>
  </nav>

  <div class="container-fluid mt-3">
    <!-- Content (START) -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/kai1.jpg" class="d-block w-100" alt="CS">
        </div>
        <div class="carousel-item">
          <img src="./images/kai2.jpg" class="d-block w-100" alt="KAI 2">
        </div>
        <div class="carousel-item">
          <img src="./images/kai3.jpg" class="d-block w-100" alt="KAI 3">
        </div>
        <div class="carousel-item">
          <img src="./images/kai4.jpg" class="d-block w-100" alt="KAI 4">
        </div>
        <div class="carousel-item">
          <img src="./images/kai5.jpg" class="d-block w-100" alt="KAI 5">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Content (END) -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>