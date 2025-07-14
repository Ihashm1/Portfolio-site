<?php
session_start();

// Retrieve the data
$title = $_GET['title'];
$content = $_GET['content'];
$date = $_GET['date'];

$dateTime = new DateTime($date);
$formattedDate = $dateTime->format('jS F Y, H:i') . " UTC";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview Post</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="blogentries.css">
</head>
<body>

    <h1>Preview Post</h1>
    <div class="blog-container">   
            <div class="blog-entry">
                <!-- Use the values from the POST data directly -->
                <div class="entry-title"><?= $title; ?></div>
                <div class="entry-date-time"><?= $formattedDate; ?></div>
                <div class="entry-content"><?= $content; ?></div>
                <hr />
            </div>

        <div class="navigation-links">

            <!-- Link to go back to edit the post -->
            <a href="addentry.php?title=<?= urlencode($title) ?>&content=<?= urlencode($content) ?>"class="preview_button">Go back to edit</a>

            <!-- Link to upload the post (save to database) -->
            <a href="addpost.php?title=<?= urlencode($title) ?>&content=<?= urlencode($content) ?>"class="preview_button"> Upload Post</a>
        </div>
    </div>

</body>
</html>

