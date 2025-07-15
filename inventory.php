<?php
include 'db.php';

if(isset($_POST['add'])) {
    $medicine = $_POST['medicine'];
    $batch = $_POST['batch'];
    $expiry = $_POST['expiry'];
    $qty = $_POST['qty'];

    $conn->query("INSERT INTO inventory (medicine, batch, expiry, qty) 
                  VALUES ('$medicine', '$batch', '$expiry', '$qty')");
}

$result = $conn->query("SELECT * FROM inventory");
?>

<h2>Inventory Management</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="text" name="medicine" placeholder="Medicine Name" required>
    <input type="text" name="batch" placeholder="Batch Number" required>
    <input type="date" name="expiry" required>
    <input type="number" name="qty" placeholder="Quantity" required>
    <button type="submit" name="add">Add Inventory</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Medicine</th><th>Batch</th><th>Expiry</th><th>Quantity</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['medicine']; ?></td>
    <td><?php echo $row['batch']; ?></td>
    <td><?php echo $row['expiry']; ?></td>
    <td><?php echo $row['qty']; ?></td>
</tr>
<?php } ?>
</table>
