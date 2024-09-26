<?php
class Autenticacion {

    public function login(PDO $db, string $email, string $password): bool {
        try {
            // Preparar la consulta
            $query = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            // Obtener el usuario si existe
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verificar si el usuario fue encontrado y si la contraseña es correcta
            // Agregar depuración temporal
            var_dump($user, $password);
            if ($user && password_verify($password, $user['password'])) {
                // Mantener los datos del usuario en la sesión
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['is_admin'] = $user['administrador'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['apellido'] = $user['apellido'];
                $_SESSION['email'] = $user['email'];
                // Mensajes de depuración
                error_log("Usuario autenticado: ID -> " . $_SESSION['user_id'] . ", Admin -> " . $_SESSION['is_admin']);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //
            // Capturar errores de la base de datos y mostrar un mensaje (opcional: loggear el error)
            error_log("Error en la consulta de login: " . $e->getMessage());
            return false;
        }
    }


    // Cerrar sesión del usuario
    public function logout(): void {
        session_start();
        session_unset();
        session_destroy();
    }

    // Verificar si el usuario está logueado
    public function estaAutenticado(): bool {
        return isset($_SESSION['user_id']);
    }

    // Verificar si es admin
    public function isAdmin(): bool {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
    }
    
}

?>