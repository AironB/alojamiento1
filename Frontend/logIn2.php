<?php
session_start();
require_once '../Database/Database.php';
require_once '../Backend/Autenticacion.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $auth = new Autenticacion();
    $database = new Database();
    $db = $database->getConection();

    $is_admin = $auth->login($db, $email, $password);

    if ($is_admin !== null) {
        if ($is_admin == 1) {
            header('Location: admin2.php');
        } else {
            header('Location: index2.php');
        }
        exit;
    } else {
        $database = new Database();
        $db = $database->getConection();
        $auth = new Autenticacion();

        $esta_autenticado = $auth->login($db, $email, $password);

        if ($esta_autenticado) {
            // // Store user role in session
            // $_SESSION['is_admin'] = $esta_autenticado;

            if ($_SESSION['is_admin'] == 1) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
            exit;
        } else {
            $error_message = 'Invalid email or password';
            error_log("Error: No se pudo autenticar al usuario.");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 22rem;">
            <h2 class="text-center mb-4">Log In</h2>
            <form action="logIn2.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log In</button>
                <div class="mt-3 text-center">
                    <span>Don't have an account?</span> <a href="signUp.php">Sign Up</a>
                </div>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
