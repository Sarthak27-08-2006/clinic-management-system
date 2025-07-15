<?php
include 'db.php';

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    $conn->query("INSERT INTO suppliers (name, contact) VALUES ('$name', '$contact')");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM suppliers WHERE id=$id");
}

$result = $conn->query("SELECT * FROM suppliers");
?>

<h2>Supplier Management</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="text" name="name" placeholder="Supplier Name" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <button type="submit" name="add">Add Supplier</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Name</th><th>Contact</th><th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['contact']; ?></td>
    <td><a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
