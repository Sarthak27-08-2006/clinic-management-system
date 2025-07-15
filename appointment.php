<?php
include 'db.php';

if(isset($_POST['book'])) {
    $patient_id = $_POST['patient_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $conn->query("INSERT INTO appointments (patient_id, date, time, status) VALUES ('$patient_id', '$date', '$time', 'Scheduled')");
}

if(isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $conn->query("UPDATE appointments SET status='Cancelled' WHERE id=$id");
}

$result = $conn->query("SELECT appointments.*, patients.name FROM appointments JOIN patients ON appointments.patient_id = patients.id");
?>

<h2>Appointment Management</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="number" name="patient_id" placeholder="Patient ID" required>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button type="submit" name="book">Book Appointment</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Patient</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['time']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>
        <?php if($row['status'] == 'Scheduled') { ?>
        <a href="?cancel=<?php echo $row['id']; ?>">Cancel</a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>
