<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}


// Get the title and content from the URL query string (if they are set)
$title = isset($_GET['title']) ? $_GET['title'] : '';
$content = isset($_GET['content']) ? $_GET['content'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="addentry.css">
    <link rel="stylesheet" type="text/css" href="mobile/addentry_mobile.css" media="screen and (max-width: 768px)">
    <script src="addentry.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Add Blog Entry</title>
</head>

<body>
<h1>Welcome, Ishrat!</h1>
    <div class="container">
            <header>Blog</header>
            <form action="addpost.php" method="POST">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $title ?>" required>

    <label for="text">Post:</label>
    <textarea id="text" name="text" placeholder="Type a post..." required><?= $content ?></textarea>

    <div class="buttons">
        <button type="submit">Post</button>
        <button type="reset">Cancel</button>
        <button type="submit" name="preview">Preview</button>
    </div>
</form>
        </div>
    </div>

        <footer>
        <a href="index.php" class="footer-button">Back to homepage</a>
        </footer>

</body>
</html>