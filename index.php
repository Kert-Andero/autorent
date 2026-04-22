<?php include("config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
      .hero {
        height: 300px;
         /* background-image: url("https://loremflickr.com/1200/400");
        background-size: cover;
        background-position: center; */
      }
    </style>

</head>
<body>
    <!-- Menüü -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Avaleht</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Hinnad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontakt</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Otsi" aria-label="Search" name="search"/>
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<!-- Hero -->
    <div class="container py-4">
      <div class="hero bg-body-tertiary p-4">
        <div class="row h-100">
            <div class="col-sm-6">
                <h1>Rendi auto<br>soodsalt</h1>
                <p class="text-secondary">Lai valik autosid igaks olukorraks</p>
                <button class="btn btn-dark">Vaata autosid</button>
            </div>
            <div class="col-sm-6">
                <img class="image-fluid h-100" src="https://loremflickr.com/600/250/audi" alt="autopilt">
            </div>
        </div>
      </div>
    </div>

  <!-- Kui autot ei leitud -->
  
  <!-- Kaart -->
   <div class="container">
  <div class="hero bg-body-tertiary p-4">
  <div class="col-sm-3">
  <div class="card" style="width: 18rem;">
  <img class="image-fluid h-100" src="https://loremflickr.com/200/150/audi" alt="autopilt">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
    <button class="btn btn-dark">Rendi</button>
  </div>
</div>
<div>
  </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>