<?php
class Cliente extends Usuario {
    public function __construct(
        ?int $id_usuario,
        string $nombre,
        string $apellido,
        string $email,
        string $password
    ) {
        parent::__construct($id_usuario, $nombre, $apellido, $email, $password, false); // admin = false
    }

    // Implementación del método abstracto crearUsuario
    public function crearUsuario(PDO $db): bool {
        try {
            // Encriptar la contraseña
            $hashed_password = password_hash($this->getPassword(), PASSWORD_DEFAULT);

            // Consulta SQL para insertar usuarios clientes en la tabla 'usuarios'
            $sql = 'INSERT INTO usuarios (nombre, apellido, email, password, administrador) 
                    VALUES (:nombre, :apellido, :email, :password, :administrador)';

            // Preparar la consulta
            $stmt = $db->prepare($sql);

            // Ejecutar la consulta con los valores correspondientes
            return $stmt->execute([
                'nombre' => $this->getNombre(),
                'apellido' => $this->getApellido(),
                'email' => $this->getEmail(),
                'password' => $hashed_password,
                'administrador' => 0 // Este campo es 0 para cliente
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>