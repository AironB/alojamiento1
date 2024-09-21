<?php
class Cliente extends Usuario{
    public function __construct(
        ?int $id_usuario,
        string $nombre,
        string $apellido,
        string $email,
        string $passwrd
    ) {
        parent::__construct($id_usuario, $nombre, $apellido, $email, $passwrd, false); // admin = false
    }

    // Implementación del método abstracto crearUsuario
    public function crearUsuario(PDO $db): bool {
        try {
            // Encriptar la contraseña
            $hashed_password = password_hash($this->getPassword(), PASSWORD_BCRYPT);

            // Consulta SQL para insertar usuarios clientes en la tabla 'usuarios'
            $sql = 'INSERT INTO usuarios (nombre, apellido, email, passwrd, administrador) 
                    VALUES (:nombre, :apellido, :email, :passwrd, :administrador)';

            // Preparar la consulta
            $stmt = $db->prepare($sql);

            // Ejecutar la consulta con los valores correspondientes
            return $stmt->execute([
                ':id_usuario' => $this->getIdUsuario(),
                ':nombre' => $this->getNombre(),
                ':apellido' => $this->getApellido(),
                ':email' => $this->getEmail(),
                ':password' => $hashed_password,
                ':administrador' => 0 // Este campo es 0 para cliente
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}
/**Este código debe ir en un archivo dedicado al registro de usuarios. Este archivo se llamará cuando
 * el usuario envíe el formulario de registro desde la vista de creación de cuentas. */
// Comprobamos si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que se reciban todos los campos necesarios
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Crear un nuevo cliente. Suponemos que $id_usuario será autogenerado por la base de datos.
        $cliente = new Cliente(null, $nombre, $apellido, $email, $password); // Enviamos null si el id_usuario es autogenerado
        
        // Intentar crear el usuario en la base de datos
        if ($cliente->crearUsuario($db)) {
            echo "<script>Swal.fire('Success', 'Usuario registrado exitosamente', 'success');</script>";
        } else {
            echo "<script>Swal.fire('Error', 'Fallo al registrar usuario', 'error');</script>";
        }
    } else {
        echo "<script>Swal.fire('Error', 'Todos los campos son requeridos', 'error');</script>";
    }
}
?>