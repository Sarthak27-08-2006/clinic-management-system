<?php
include 'db.php';

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $conn->query("INSERT INTO medicines (name, price, quantity) VALUES ('$name', '$price', '$qty')");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM medicines WHERE id=$id");
}

$result = $conn->query("SELECT * FROM medicines");
?>

<h2>Medicine Management</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="text" name="name" placeholder="Medicine Name" required>
    <input type="text" name="price" placeholder="Price" required>
    <input type="number" name="qty" placeholder="Quantity" required>
    <button type="submit" name="add">Add Medicine</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
