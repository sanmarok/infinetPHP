<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeNumber = $_POST['employeeNumber'];
    $employeePassword = $_POST['employeePassword'];

    // Realiza la verificación de las credenciales en tu base de datos (debes adaptar esta parte).
    // Aquí, se asume una tabla "users" con campos "employeeNumber", "employeePassword", y "role".
    // Verifica si el usuario y la contraseña coinciden en la base de datos.
    // Si coinciden, establece la sesión con el idEmployee y el role del usuario.

    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'infinet_test';

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    $sql = "SELECT idEmployee, role FROM users WHERE employeeNumber = ? AND employeePassword = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $employeeNumber, $employeePassword);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($idEmployee, $role);
            $stmt->fetch();

            // Inicio de sesión exitoso. Establece la sesión con el idEmployee y el role.
            $_SESSION['idEmployee'] = $idEmployee;
            $_SESSION['role'] = $role;

            header('Location: home.php'); // Redirige a la página de inicio.
        } else {
            echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Error en la consulta: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
