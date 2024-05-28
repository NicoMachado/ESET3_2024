<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $numero = $_POST['numero'] ?? '';

    
    if (empty($nombre) || empty($numero)) {
        $error = "Por favor, ingrese un nombre y un número.";
    } else {
        $datosIngresados = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Ingreso</title>
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' || !empty($error)): ?>
        <form action="ejercicio_web.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $nombre ?? '' ?>" >
            <br>
            <label for="ape">Apellido:</label>
            <input type="text" id="apellido" name="apellido" >
            <br>
            <label for="numero">Número Dni:</label>
            <input type="number" id="numero" name="numero" >
            <br>
            <button type="submit">Enviar</button>
        </form>
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>
    <?php elseif (!empty($datosIngresados)): ?>
        <p>Nombre: <?php echo htmlspecialchars($nombre); ?></p>
        <p>Apellido: <?php echo htmlspecialchars($apellido); ?></p>
        <p>Número: <?php echo htmlspecialchars($numero); ?></p>
        <a href="ejercicio_web.php">Volver a la página inicial</a>
    <?php endif; ?>
</body>
</html>
