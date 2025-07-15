<?php
include 'db.php';

if(isset($_POST['add'])) {
    $patient_id = $_POST['patient_id'];
    $details = $_POST['details'];
    $medicine = $_POST['medicine'];
    $bill = $_POST['bill'];

    $conn->query("INSERT INTO checkups (patient_id, details, medicine, bill) 
                  VALUES ('$patient_id', '$details', '$medicine', '$bill')");
}

$result = $conn->query("SELECT checkups.*, patients.name FROM checkups JOIN patients ON checkups.patient_id = patients.id");
?>

<h2>Patient Checkup & Prescription</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="number" name="patient_id" placeholder="Patient ID" required>
    <textarea name="details" placeholder="Checkup Details" required></textarea><br>
    <input type="text" name="medicine" placeholder="Prescribed Medicines" required>
    <input type="number" name="bill" placeholder="Billing Amount" required>
    <button type="submit" name="add">Submit Checkup</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Patient</th><th>Details</th><th>Medicine</th><th>Bill</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['details']; ?></td>
    <td><?php echo $row['medicine']; ?></td>
    <td><?php echo $row['bill']; ?></td>
</tr>
<?php } ?>
</table>
