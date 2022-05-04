<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page 
Security::checkAuthority('tech');

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
    <h2>Open Incidents</h2>
    <a href="../index.php">Home</a>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>