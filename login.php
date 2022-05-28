<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="Login for Assignment Part 2, COS10026">
    <meta name="keywords" content="Login">
    <meta name="author" content="Minh Nhat Nguyen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body id="login-page">
    <div class="background-image">
        <main class="login-container">
            <h1>Login</h1>
            <form action="./authentication.php" method="POST" class="login-form">
                <div class="box">
                    <input type="text" name="username" class="text-box" placeholder="Student ID" value="103534696">
                </div>
                <div class="box">
                    <input type="password" name="pass" class="text-box" placeholder="Password" value="helloworld">
                </div>
                <input id="login-btn" type="submit" value="Login">
            </form>
            <!-- <p class="copyright">Mark up by: <a href="mailto:103831821@student.swin.edu.au"
          class="footer-list-anchor white link" target="_blank">Minh Nhat Nguyen</a></p> -->
        </main>

    </div>
    <?php
        require('./navbar.inc')
    ?>
</body>
</html>