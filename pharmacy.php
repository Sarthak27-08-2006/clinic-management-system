<?php
include 'db.php';

if(isset($_POST['bill'])) {
    $patient_id = $_POST['patient_id'];
    $medicine = $_POST['medicine'];
    $amount = $_POST['amount'];

    $conn->query("INSERT INTO pharmacy (patient_id, medicine, amount) VALUES ('$patient_id', '$medicine', '$amount')");
}

$result = $conn->query("SELECT pharmacy.*, patients.name FROM pharmacy JOIN patients ON pharmacy.patient_id = patients.id");
?>

<h2>Pharmacy Billing</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="number" name="patient_id" placeholder="Patient ID" required>
    <input type="text" name="medicine" placeholder="Medicine Name" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <button type="submit" name="bill">Generate Bill</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Patient</th><th>Medicine</th><th>Amount</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['medicine']; ?></td>
    <td><?php echo $row['amount']; ?></td>
</tr>
<?php } ?>
</table>
