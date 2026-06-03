<?php include("config.php");
session_start();
if ($_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit();
}

?>

<?php

if(!empty($_GET["mark"]) && !empty($model = $_GET["model"]) && !empty($model = $_GET["price"]) ){
  $mark = $_GET["mark"];
  $model = $_GET["model"];
  $engine = $_GET["engine"];
  $fuel = $_GET["fuel"];
  $price = $_GET["price"];
  $image = $_GET["image"];
  $description = $_GET["description"];
  $status = $_GET["status"];
  $year = $_GET["year"];
  $seats = $_GET["seats"];
  $transmission = $_GET["transmission"];

$paring= "INSERT INTO `cars` (`mark`, `model`, `engine`, `fuel`, `price`, `image`, `description`, `status`, `year`, `seats`, `transmission`) 
VALUES ('".$mark."', '".$model."', '".$engine."', '".$fuel."', '".$price."', '".$image."', '".$description."', '".$status."', '".$year."', '".$seats."', '".$transmission."')";
 
$valjund = mysqli_query($yhendus, $paring);
$tulemus = mysqli_affected_rows($yhendus);

mysqli_close($yhendus);

if($tulemus) {
    header("Location: admin.php");
}
else {
    echo "jama salvestamisel";
}
 }
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Lisa auto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- menüü -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reserveeringud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kasutajad</a>
        </li>
      </ul>
      <button class="btn btn-danger" onclick="window.location.href='index.php'">Logout</button>
    </div>
  </div>
</nav>
<!-- menüü -->

<div class="container mt-5">
   <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lisa auto</h2>
            <a href="admin.php" class="btn btn-outline-secondary btn">Tagasi</a>
        </div>
         <hr>

        <div class="card-body mb-4">

            <form method="GET" enctype="multipart/form-data">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mark</label>
                        <input type="text" name="mark" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mudel</label>
                        <input type="text" name="model" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Engine</label>
        <select name="engine" class="form-select" required>
            <option>Wankel</option>
            <option>Diesel</option>
            <option>Rotary</option>
            <option>Hybrid</option>
            <option>V8</option>
            <option>Turbocharged</option>
            <option>Inline-6</option>
            <option>V6</option>
            <option>4-cylinder</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Fuel</label>
        <select name="fuel" class="form-select" required>
            <option>Electric</option>
            <option>gasoline</option>
            <option>biofuel</option>
            <option>hydrogen</option>
            <option>diesel</option>
        </select>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Hind (€ / päev)</label>
        <input type="number" name="price" class="form-control" min="50" max="250" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Aasta</label>
        <input type="number" name="year" class="form-control" min="1900" max="2026" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Istekohti</label>
        <input type="number" name="seats" class="form-control" min="2" max="8" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Käigukast</label>
        <select name="transmission" class="form-select" required>
            <option>automatic</option>
            <option>manual</option>
            <option>sequential</option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Kirjeldus (max 50 tähemärki)</label>
    <input type="text" name="description" maxlength="50" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Staatus</label>
    <select name="status" class="form-select" required>
        <option value="vaba">vaba</option>
        <option value="renditud">renditud</option>
        <option value="hoolduses">hoolduses</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Auto pilt</label>
    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp" required>
</div>

                <hr>

                a<button type="submit" class="btn btn-dark">Salvesta</button>
                <a href="admin.php" class="btn btn-secondary">Tühista</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>