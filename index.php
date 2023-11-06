<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>

<body>
    <h1>Iniciar sesión</h1>
    <form method="POST" action="login.php">
        <label for="employeeNumber">Número de Empleado:</label>
        <input type="text" name="employeeNumber" id="employeeNumber" required>
        <br>
        <label for="employeePassword">Contraseña:</label>
        <input type="password" name="employeePassword" id="employeePassword" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>