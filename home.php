<?php
session_start();

// Verificar si existe una sesión activa con el idnumber del usuario
if (isset($_SESSION['idEmployee'])) {
    echo "Bienvenido a la página de inicio, usuario con ID: " . $_SESSION['idEmployee'] . '<br>';
    switch ($_SESSION['role']) {
        case '1':
            echo 'Sos administrador - Funciones de administrador';
            break;
        case '2':
            echo 'Sos tecnico - Funciones de tecnico';
            break;
        case '3':
            echo 'Sos secretario - Funciones de secretario';
            break;
        default:
            # code...
            break;
    }
} else {
    header('Location: index.php');
    exit();
}
