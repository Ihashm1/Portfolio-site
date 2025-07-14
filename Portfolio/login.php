<?php
session_start();

$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "credential"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// error if not connected
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submitted data
$email = $_POST['email'];
$pass = $_POST['psw'];

// SQL query to grab the email and password from the database
$sql = "SELECT * FROM login";
$result = $conn->query($sql);

$found = false;

// Check if the email and password match the one in the database
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
    {
        if ($row['email'] == $email && $row['password'] == $pass) {
            $found = true;
        }
    }
}

if ($found) {
    // User found, create session
    $_SESSION['email'] = $email;
    header("Location: addentry.php");
    exit();
} else {
    echo "Invalid login credentials. <a href='index.php'>Try again</a>";
}

$conn->close();
?>