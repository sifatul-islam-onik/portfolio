<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="login">
        <form class="login-form" action="/login.php" method="post">
            <h2 class="login-heading">Login to Dashboard</h2>
            <input type="password" class="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
    <?php
    session_start();
    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputPassword = $_POST['password'];
        $stmt = $pdo->prepare("SELECT password FROM admin WHERE id = 1 LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($inputPassword, $result['password'])) {
            $_SESSION['logged_in'] = true;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    }
    ?>

</body>

</html>