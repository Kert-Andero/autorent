<?php include("config.php");
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){

$email = $_POST['email'];
$password = $_POST['password'];

$paring = "SELECT id, password_hash, role FROM users WHERE email='$email'";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($yhendus, $paring);
    $rida = mysqli_fetch_assoc($result);

    if ($rida && password_verify($password, $rida['password_hash'])) {
    echo "OK";
    $_SESSION['user_id'] = $rida['id'];
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $rida['role'];
    if ($rida['role'] == 'user') {
      header("Location: index.php");
    } else {
      header("Location: index.php");
    }
    
} else {
    echo "Viga";
}

    }
}
?>

<style>.gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
</style>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Autod</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1">We are The Car Rent</h4>
                </div>

                <form method="post">

                  <p>Loo kasutaja</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" class="form-control" placeholder="email address" value="tavakasutaja@gmail.com"/>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                     <input type="password" class="form-control" name="password" placeholder="Parool" />
                  </div>

                  <div class="text-center pt-1 mb-1 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" href="index.php">Registreeri</button>
                  </div>

                    <div class="text-center pt-1 mb-2 mx-5 px-5">
                    <a href="index.php" class="btn btn-primary btn-block fa-lg gradient-custom-2 form-control">Tagasi avalehele</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>