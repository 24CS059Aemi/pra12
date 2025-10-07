<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // File upload (Intermediate)
    $poster = '';
    if(isset($_FILES['poster']) && $_FILES['poster']['name'] != ''){
        $poster = 'uploads/' . $_FILES['poster']['name'];
        move_uploaded_file($_FILES['poster']['tmp_name'], $poster);
    }

    $sql = "INSERT INTO events (title, description, date, status, poster) 
            VALUES ('$title', '$description', '$date', '$status', '$poster')";

    if ($conn->query($sql) === TRUE) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Event</title></head>
<body>
<h2>Add New Event</h2>
<form method="POST" enctype="multipart/form-data">
    Title: <input type="text" name="title" required><br><br>
    Description: <textarea name="description"></textarea><br><br>
    Date: <input type="date" name="date" required><br><br>
    Status: 
    <select name="status">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
    </select><br><br>
    Poster: <input type="file" name="poster"><br><br>
    <input type="submit" value="Add Event">
</form>
<a href="view_events.php">View Events</a>
</body>
</html>
