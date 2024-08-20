<?php
session_start();
require 'conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['user_data']; 
    $idUsuario = $user['id_usuario']; 
    $passwordActual = $_POST['passwordActual'];
    $passwordNueva = $_POST['passwordNueva'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if ($passwordNueva !== $passwordConfirm) {
        $_SESSION['message'] = 'Las nuevas contraseñas no coinciden.';
        header('Location: perfilUsuario.php');
        exit;
    }

    $stmt = $conexion->prepare("SELECT contraseña FROM tab_usuario WHERE id_usuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->bind_result($contrasenaHashActual);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($passwordActual, $contrasenaHashActual)) {
        $_SESSION['message'] = 'La contraseña actual no es correcta.';
        header('Location: perfilUsuario.php');
        exit;
    }

    $contrasenaHashNueva = password_hash($passwordNueva, PASSWORD_BCRYPT);

    $stmt = $conexion->prepare("CALL ActualizarContrasena(?, ?, @resultado)");
    $stmt->bind_param("is", $idUsuario, $contrasenaHashNueva);
    $stmt->execute();

    $result = $conexion->query("SELECT @resultado AS resultado");
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['message'] = $row['resultado'];
    } else {
        $_SESSION['message'] = 'Hubo un problema al actualizar la contraseña.';
    }

    $stmt->close();
    $conexion->close();

    header('Location: perfilUsuario.php');
    exit;
}
?>