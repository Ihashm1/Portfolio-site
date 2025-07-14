<?php
session_start();

// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all blog entries
$sql = "SELECT * FROM entries";
$result = $conn->query($sql);

// Initialise posts array
$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Sort posts array by date descending (most recent first)
usort($posts, function ($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Build months list
$months = [];
foreach ($posts as $post) {
    $date = new DateTime($post['date']);
    $monthYear = $date->format('F Y'); // Example: "April 2025"
    if (!in_array($monthYear, $months)) {
        $months[] = $monthYear;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Blog Posts</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="blogentries.css" />
</head>
<body>
    <h1>Blog Entries</h1>

    <div class="blog-container">

        <!-- Month Filter Dropdown -->
        <form method="GET" action="">
            <label for="month">Select Month:</label>
            <select name="month" id="month">
                <option value="">-- Select Month --</option>
                <?php foreach ($months as $month): ?>
                    <option value="<?= $month ?>">
                        <?= $month ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filter</button>
        </form>

        <?php
        // Filter posts by selected month if any
        $selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';

        // Track if any posts are displayed
        $foundPosts = false;

        // Start the loop to display blog posts
        foreach ($posts as $row) {
            $dateTime = new DateTime($row['date']);
            $postMonth = $dateTime->format('F Y'); // e.g., "March 2025"

            // Check if the post's month matches the selected month or if no month is selected
            if ($selectedMonth === '' || $postMonth === $selectedMonth) {
                $formattedDate = $dateTime->format('jS F Y, H:i') . " UTC";
                ?>
                <div class="blog-entry">
                    <div class="entry-title"><?= $row['title']; ?></div>
                    <div class="entry-date-time"><?= $formattedDate; ?></div>
                    <div class="entry-content"><?= $row['content']; ?></div>
                    <hr />
                </div>
                <?php
                $foundPosts = true;
            }
        } // End of foreach loop

        // If no posts found for the selected month
        if (!$foundPosts) {
            ?>
            <p>No blog posts found for this month.</p>
            <?php
        }
        ?>

    </div>

    <footer>
        <a href="index.php" class="footer-button">Back to homepage</a>
        <a href="addentry.php" class="footer-button">Add Post</a>
    </footer>
</body>
</html>
