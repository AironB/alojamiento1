<?php
class Autenticacion{
    //verificar si las credenciales del usuario son correctas
public function login(PDO $db, string $email, string $password): bool {
    $query = "SELECT id_usuario, administrador, email, passwrd  FROM usuarios WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    // $stmt ->bindParam(':id_usuario', $id_usuario);
    // $stmt ->bindParam(':administrador', $administrador);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    //mantener datos de usuario
    $_SESSION['user_id'] = $user['id_usuario'];
    //$_SESSION['administrador'] = $user['administrador'];
    //$_SESSION['']=$user[];
    return true;
} else {
    return false;
}
}
//cerrar sesion del usuario
public function logout(): void{
    session_start();
    session_unset();
    session_destroy();
}

//verificar si el usuario esta logueado
    public function estaAutenticado(): bool{
        return isset($_SESSION['user_id']);
        echo $id_usuario;       
    }
    // verificar si es admin
    public function isAdmin(): bool {
        return isset($_SESSION['administrador']) && $_SESSION['administrador'];
        echo "es admin";
    }
}
?>
