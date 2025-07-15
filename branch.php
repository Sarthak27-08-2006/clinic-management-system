<?php
include 'db.php';

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $conn->query("INSERT INTO branches (name, location) VALUES ('$name', '$location')");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM branches WHERE id=$id");
}

$result = $conn->query("SELECT * FROM branches");
?>

<h2>Branch Management</h2>
<a href="dashboard.php">Back to Dashboard</a>

<form method="post">
    <input type="text" name="name" placeholder="Branch Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <button type="submit" name="add">Add Branch</button>
</form>

<table border="1" cellpadding="10" style="margin:20px auto;">
<tr>
    <th>ID</th><th>Name</th><th>Location</th><th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
