<?php
include_once('./classes/Database.php');
include_once('./classes/User.php');
$errorMessages[]=[];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $user = new User();

    if (!$user->valide_Username($username)) {
        $errorMessages[] = 'Nom d\'utilisateur non valide. Il doit comporter au moins 3 caractères et ne contenir que des lettres et des chiffres';
    }
    if (!$user->valide_Email($email)) {
        $errorMessages[] = 'Format de courriel non valide.';
    }
    if (!$user->valide_Password($password)) {
        $errorMessages[] = 'Le mot de passe doit comporter au moins 8 caractères, contenir une lettre majuscule, une lettre minuscule et un chiffre.';
    }
    if ($password !== $confirmPassword) {
        $errorMessages[] = 'Le mot de passe et le mot de passe de confirmation ne correspondent pas.';
    }

    if (empty($errorMessages)) {
        if ($user->register($username, $email, $password)) {
            header('Location: ../ProjetSKH/index.html');
            exit();
        } else {
            $errorMessages[] = "L'inscription a échoué! Email peut déjà être utilisé.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet --
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    < Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Téléchargement en cours...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <?php foreach ($errorMessages as $message) {
            // echo "<p>".$message."</p>";
        } ?>
        <form class="container-fluid" action="../index copy.php" method="post">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <!-- <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Jonathan</h3>
                            </a> -->
                            &ensp;<h3>Inscription</h3>&ensp;
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="username" placeholder="Username" required>
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Entrez votre mot de passe" required>
                            <label for="floatingPassword">Mot de passe</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                            <label for="confim_password">Confirmation du mot de passe</label>
                        </div>
                        <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Vérification de votre identité</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div> -->
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" href='../ProjetSKH/index.html'>S'inscrire</button>
                        <p class="text-center mb-0">Vous avez déjà un compte ? <a href="./signin.html">Se connecter</a></p>
                        <p class="text-center mb-0"> <a href="../index.php">Retour aux produits !</a></p>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>