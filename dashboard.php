<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?> (<?php echo $role; ?>)</h2>
    <a href="logout.php">Logout</a>

    <ul>
        <?php if ($role == "Admin" || $role == "Receptionist") { ?>
            <li><a href="medicine.php">Manage Medicines</a></li>
            <li><a href="supplier.php">Manage Suppliers</a></li>
        <?php } ?>

        <?php if ($role == "Admin" || $role == "Main Doctor") { ?>
            <li><a href="branch.php">Manage Branches</a></li>
        <?php } ?>

        <?php if ($role == "Receptionist" || $role == "Assistant Doctor") { ?>
            <li><a href="patient.php">Manage Patients</a></li>
        <?php } ?>

        <?php if ($role == "Receptionist" || $role == "Patient") { ?>
            <li><a href="appointment.php">Appointments</a></li>
        <?php } ?>

        <?php if ($role == "Assistant Doctor" || $role == "Main Doctor") { ?>
            <li><a href="checkup.php">Patient Checkup</a></li>
        <?php } ?>

        <?php if ($role == "Pharmacist") { ?>
            <li><a href="pharmacy.php">Pharmacy Billing</a></li>
            <li><a href="inventory.php">Inventory Management</a></li>
        <?php } ?>
    </ul>
</body>
</html>
