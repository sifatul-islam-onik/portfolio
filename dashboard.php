<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <?php
    session_start();
    require 'db.php';
    require 'remember_me.php';
    
    // Check if user is logged in via session
    $isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    
    // If not logged in via session, check remember me token
    if (!$isLoggedIn) {
        $rememberMeToken = $rememberMe->getRememberMeToken();
        if ($rememberMeToken) {
            $adminId = $rememberMe->validateToken($rememberMeToken);
            if ($adminId) {
                $_SESSION['logged_in'] = true;
                $_SESSION['admin_id'] = $adminId;
                $isLoggedIn = true;
            } else {
                // Invalid token, clear the cookie
                $rememberMe->clearRememberMeCookie();
            }
        }
    }
    
    // Redirect if still not logged in
    if (!$isLoggedIn) {
        header("Location: /login.php");
        exit();
    }
    ?>

    <div class="dashboard">
        <div class="dashboard-nav" id="dashboard-nav">
            <div class="dashboard-title">Dashboard</div>
            <div class="nav-item active" data-page="messages">Messages</div>
            <div class="nav-item" data-page="add-project">Add Project</div>
            <div class="nav-item" data-page="delete-project">Delete Project</div>
            <div class="nav-item" data-page="logout">Logout</div>
        </div>
        <div class="dashboard-content" id="dashboard-content"></div>
    </div>

    <button class="hamburger" id="hamburger"><i class="fa-solid fa-bars"></i></button>

    <script src="/js/admin.js"></script>
</body>

</html>