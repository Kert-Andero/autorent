<?php include("config.php");
session_start();
if (isset($_POST['rent-auto'])) {

    $car_id = $_POST['car_id'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $total = $_POST['total'];
    $user_id = $_SESSION['user_id'];

    if ($start > $end) {
        echo "<div class='alert alert-danger'>Vale kuupäev!</div>";
    } else {

        $kontroll = "SELECT * FROM reservations 
                  WHERE car_id='$car_id' 
                  AND status='renditud'
                  AND ('$start' <= end_date) 
                  AND ('$end' >= start_date)";

        $tulemus = mysqli_query($yhendus, $kontroll);

        if (mysqli_num_rows($tulemus) > 0) {
            echo "<div class='alert alert-danger'>See auto on juba sellel ajal broneeritud!</div>";
        } else {

            $paring = "INSERT INTO reservations (car_id, user_id, start_date, end_date, total_price, status)
                       VALUES ('$car_id', '$user_id', '$start', '$end', '$total', 'renditud')";

            if (mysqli_query($yhendus, $paring)) {
               $update_car = "UPDATE cars SET status='renditud' WHERE id='$car_id'";
               mysqli_query($yhendus, $update_car);
                echo "<div class='alert alert-success'>Auto edukalt renditud!</div>";
            } else {
                echo "<div class='alert alert-danger'>Viga: " . mysqli_error($yhendus) . "</div>";
            }
        }
    }
}
?>

<!doctype html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auto detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href='index.php'>Avaleht</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Autod</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Hinnad</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontakt</a></li>
      </ul>
      <form class="d-flex">
        <input class="form-control form-control-sm me-2" type="search" placeholder="Otsi autot">
        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<!-- SISU -->
<div class="container my-5">

<?php
$id=$_GET["car_id"];
$paring = 'SELECT * FROM cars WHERE id='.$id.'';
$valjund = mysqli_query($yhendus, $paring);
$rida = mysqli_fetch_row($valjund);
?>
  <div class="card shadow-sm">
    <div class="row g-0">

      <!-- Pilt -->
      <div class="col-md-6">
        <img src="https://loremflickr.com/800/500/audi"
             class="img-fluid h-100 object-fit-cover rounded-start"
             alt="Auto pilt">
      </div>

      <!-- Info -->
      <div class="col-md-6">
        <div class="card-body p-4">

          <h3 class="card-title mb-3"><?php echo $rida[1]." ". $rida[2] ?></h3>
          <p class="text-muted mb-4"><?php echo $rida[9]?></p>

          <ul class="list-unstyled mb-4">
            <li><strong>Mootor: </strong><?php echo $rida[3]?></li>
            <li><strong>Kütus: </strong><?php echo $rida[4]?></li>
            <li><strong>Käigukast: </strong><?php echo $rida[5]?></li>
            <li><strong>Kohad: </strong><?php echo $rida[10]?></li>
            <li><strong>Staatus: </strong><?php echo $rida[8]?></li>
          </ul>

          <h4 class="mb-3"><?php echo $rida[5]?> € / päev</h4>

          <?php
          if ($_SESSION['role'] == "user") { 
            ?>

            <form method="GET">
            <input type="text" name="car_id" value="<?php echo $rida[0]?>">
            <input class="my-3" type="date" name="date-start"/>
            <input class="my-3" type="date" name="date-end"/>
            <button class="btn btn-primary ms-2" type="submit" name="rent">Arvuta</button><br>
            </form>
            
            <?php
            $hind = 0;
            if (isset($_GET['rent'])) {
                $start = $_GET['date-start'];
                $end = $_GET['date-end'];

                $days = (strtotime($end) - strtotime($start)) / 86400;

                if ($days <= 0) {
                    echo "Vale kuupäev!";
                } else {
                    $total = $days * $rida[5];
                    echo "Hind: $total € ($days päeva)";
                    $hind = $total;
                }
            }
          } else {
            ?>
             <button class="btn btn-primary ms-1" onclick="window.location.href='register.php'">Rentimiseks registreeri</button>
             <?php
          }
             if ($hind>0) {
            ?>
            <form method="POST">
            <input type="hidden" name="car_id" value="<?php echo $rida[0]; ?>">
            <input type="hidden" name="start" value="<?php echo $start; ?>">
            <input type="hidden" name="end" value="<?php echo $end; ?>">
            <input type="hidden" name="total" value="<?php echo $hind; ?>">

            <button class="btn btn-primary ms-2" type="submit" name="rent-auto">Rendi</button><br>
        </form>
        <?php          
          }
          ?>
        </div>
      </div>

    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>