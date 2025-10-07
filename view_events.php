<?php
include 'db.php';
$result = $conn->query("SELECT * FROM events");
?>

<!DOCTYPE html>
<html>
<head><title>All Events</title></head>
<body>
<h2>Events List</h2>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Date</th>
    <th>Status</th>
    <th>Poster</th>
    <th>Action</th>
</tr>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['description']}</td>
            <td>{$row['date']}</td>
            <td>{$row['status']}</td>
            <td>".($row['poster'] ? "<img src='{$row['poster']}' width='50'>" : '')."</td>
            <td>
                <a href='edit_event.php?id={$row['id']}'>Edit</a> | 
                <a href='delete_event.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }
}else{
    echo "<tr><td colspan='7'>No events found</td></tr>";
}
?>
</table>
<a href="add_event.php">Add New Event</a>
</body>
</html>
