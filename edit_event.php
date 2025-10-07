
<?php
include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM events WHERE id=$id")->fetch_assoc();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $conn->query("UPDATE events SET title='$title', description='$description', date='$date', status='$status' WHERE id=$id");
    echo "Event updated successfully!";
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Event</title></head>
<body>
<h2>Edit Event</h2>
<form method="POST">
    Title: <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
    Description: <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>
    Date: <input type="date" name="date" value="<?php echo $row['date']; ?>" required><br><br>
    Status: 
    <select name="status">
        <option value="open" <?php if($row['status']=='open') echo 'selected'; ?>>Open</option>
        <option value="closed" <?php if($row['status']=='closed') echo 'selected'; ?>>Closed</option>
    </select><br><br>
    <input type="submit" value="Update Event">
</form>
<a href="view_events.php">Back to Events</a>
</body>
</html>
