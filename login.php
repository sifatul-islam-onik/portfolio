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
            
            <div class="remember-me-container">
                <label class="remember-me-label">
                    <input type="checkbox" name="remember_me" id="remember_me" class="remember-me-checkbox">
                    <span class="remember-me-text">Remember me for 30 days</span>
                </label>
            </div>
            
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
    <?php
    session_start();
    require 'db.php';
    require 'remember_me.php';

    $rememberMeToken = $rememberMe->getRememberMeToken();
    if ($rememberMeToken) {
        $adminId = $rememberMe->validateToken($rememberMeToken);
        if ($adminId) {
            $_SESSION['logged_in'] = true;
            $_SESSION['admin_id'] = $adminId;
            header("Location: dashboard.php");
            exit();
        } else {
            $rememberMe->clearRememberMeCookie();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputPassword = $_POST['password'];
        $rememberMeChecked = isset($_POST['remember_me']) && $_POST['remember_me'] === 'on';
        
        $stmt = $pdo->prepare("SELECT id, password FROM admin WHERE id = 1 LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($inputPassword, $result['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['admin_id'] = $result['id'];
            
            if ($rememberMeChecked) {
                $token = $rememberMe->generateToken($result['id']);
                if ($token) {
                    $rememberMe->setRememberMeCookie($token);
                }
            }
            
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    }
    ?>

</body>

</html>