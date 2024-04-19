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
        <a href="#"><img class="logo" src="img/icons8-task-64.png" alt="logo"></a>
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
    <main>
        <div class="contain_slogan">
            <span class="slogan">Planifica y perfeccciona</span>
            <span class="slogan">tu vida con</span>
            <span class="slogan">Edu Task</span>
        </div>
        <div class="contain_semi_slogan">
            <p class="slogan_content">La organizacion es la clave para el exito, con Edu Task, te proporcionamos las herramientas para un camino mas claro hacia tus metas</p>
            <button class="slogan_button" type="submit">Pruebala Gratis</button>
        </div>
    </main>
    <aside class="aside">
        
    </aside>
</body>
</html>