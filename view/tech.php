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
    <h1>Tech Actions</h1>
    <h2>Manage Incidents</h2>
    <a href="./tech_view_incidents.php">View Open Incidents</a>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>