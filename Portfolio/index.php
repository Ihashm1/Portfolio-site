<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="mobile/home_mobile.css" media="screen and (max-width: 768px)">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IT+Moderna:wght@100..400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header> Ishrat's Portfolio </header> 
        <nav>
            <ul>
                <li><a href="AboutMe.html">About Me</a></li>
                <li><a href="EaQ.html">Education and Qualifications</a></li>
                <li><a href="Skills&Portfolio.html">Portfolio</a></li>
                <li><a href="viewBlog.php">View Blog</a></li>
                <li><a href="Contact.html">Contact and Links</a></li>
            </ul>
        </nav>
        <div class="welcome">
            <h1>Welcome</h1>
        </div>

        <article>
            <h1>Login</h1>
        
            <!-- LOGIN FORM -->
            <form action="login.php" method="POST">
                <label for="email"><b>Email Address:</b></label>
                <input type="email" id="email" placeholder="email@outlook.com" name="email" required>
        
                <label for="psw"><b>Password:</b></label>
                <input type="password" id="psw" placeholder="Enter Password" name="psw" required>
        
                <button type="submit">Login</button>
            </form>
        
            <!-- LOGOUT FORM -->
            <form action="logout.php" method="POST">
                <button type="submit">Logout</button>
            </form>
        </article>

        <footer>
            <p>Ishrat &copy; 2025</p>
        </footer>
    </div>
</body>
</html>