<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// If the preview button is clicked, redirect to the preview page with the form data
if (isset($_POST['preview'])) {

    // get the form data and encode it for URL
    $title = urlencode($_POST['title']);
    $content = urlencode($_POST['text']);
    $date = urlencode($_POST['date']);  

    // Redirect to preview.php with the title, content, and date as query parameters
    header("Location: preview.php?title=$title&content=$content&date=$date");
    exit();
}

// Database connection details
$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via GET (for preview) or POST (for normal submission)
if (isset($_GET['title']) && isset($_GET['content'])) {
    $title = $_GET['title'];
    $content = $_GET['content'];
} else {
    // Default: handle normal POST submission
    $title = $_POST['title'];
    $content = $_POST['text'];
}

// Get date and time in required format
$date = date('Y-m-d H:i');

//insert the data into the database
$sql = "INSERT INTO entries (title, content, date) 
        VALUES ('$title', '$content', '$date')";

if ($conn->query($sql) === TRUE) {
    header("Location: viewblog.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>