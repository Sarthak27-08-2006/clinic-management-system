<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clinic Management Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Clinic Management System</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <select name="role">
            <option value="Admin">Admin</option>
            <option value="Receptionist">Receptionist</option>
            <option value="Assistant Doctor">Assistant Doctor</option>
            <option value="Main Doctor">Main Doctor</option>
            <option value="Pharmacist">Pharmacist</option>
            <option value="Patient">Patient</option>
        </select><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
