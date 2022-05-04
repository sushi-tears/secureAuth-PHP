<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page 
Security::checkAuthority('admin');

//user clicked the logout button 
if (isset($_POST['logout'])) {
    Security::logout();
}
?>
<html>
<head>
    <title>Secure User Authentication</title>
</head>

<body>
    <h1>Admin Actions</h1>
    <h2>Administrator Options</h2>
    <a href="./admin_view_accounts.php">View Accounts</a>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>