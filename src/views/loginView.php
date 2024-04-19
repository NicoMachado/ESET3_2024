<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="shortcut icon" href="../img/icons8-task-64.png" type="image/x-icon">
    <title>Edu Task</title>
</head>
<body>
    <header class="header">
        <a href="#"><img class="logo" src="../img/icons8-task-64.png" alt="logo"></a>
        <nav class="nav">
            <ul class="nav_ul">
                <li class="nav_li"><a href="#">Contacto</a></li>
                <li class="nav_li"><a href="#">EEST3</a></li>
                <li class="nav_li"><a href="#">Nosotros</a></li>
            </ul>
        </nav>
        <?php   
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                ?>
            <div class="container_user">
                <span class="user"><?php echo $_SESSION['logged_user']; ?></span>
            </div>
        <?php } else { ?>
        
        <form action="login" method="get">
            <button class="nav_button" type="submit">LOGIN</button>
        </form>
        <?php } ?>
    </header>
    <div class="login-form">
        <div class="container_login">
            <h2>Login</h2>
            <form action="login" method="POST">
                <Table>
                <tr>
                    <td>
                <span class="label_login">Username:</span>
                <input type="text" name="username" placeholder="Username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                <span class="label_login">Password:</span>
                <input type="password" name="password" placeholder="Password" required>
                    </td>
                </tr>
                </table>
                <br>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
<footer>
</footer>
</html>