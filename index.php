<?php
session_start();
require_once('controller/user.php');
require_once('controller/user_controller.php');
require_once('util/security.php');

Security::checkHTTPS();

//set the message related to login/logout functionality
$login_msg = isset($_SESSION['logout_msg']) ? $_SESSION['logout_msg'] : '';

if (isset($_POST['email']) & isset($_POST['pw'])) {
    //login and password fields were set 
    $user_level = UserController::validUser(
        $_POST['email'], $_POST['pw']);

    if ($user_level === '1') {
        $_SESSION['admin'] = true;
        $_SESSION['user'] = false;
        $_SESSION['tech'] = false;
        header("Location: view/admin.php");
    } else if ($user_level === '2') {
        $_SESSION['admin'] = false;
        $_SESSION['user'] = true;
        $_SESSION['tech'] = false;
        header("Location: view/user.php");
    } else if ($user_level === '3') {
        $_SESSION['admin'] = false;
        $_SESSION['user'] = false;
        $_SESSION['tech'] = true;
        header("Location: view/tech.php");
    } else {
        $login_msg = 'Failed Authentication - try again.';
    }
}
?>

<html>
<head>
    <title>Secure User Authentication</title>
</head>

<body>
    <h1>Secure User Authentication</h1>
    <h2>Application Login</h2>
    <form method='POST'>
        <h3>Login ID (e-mail): <input type="text" name="email"></h3>
        <h3>Password: <input type="password" name="pw"></h3>
        <input type="submit" value="login" name="login">
    </form>
    <h2><?php echo $login_msg; ?></h2>
</body>
</html>