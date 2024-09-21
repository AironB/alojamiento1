<?php
class Admin extends Usuario{
    public function __construct(
        ?int $id_usuario,
        string $nombre,
        string $apellido,
        string $email,
        string $passwrd
    )
    {
        parent::__construct($id_usuario,$nombre,$apellido,$email,$passwrd,true); //admin = true
    }

    #Implementacion del metodo abstracto
    public function crearUsuario(PDO $db): bool {
        try {
            // Encriptar la contraseña
            $hashed_password = password_hash($this->getPassword(), PASSWORD_BCRYPT);

            // Consulta SQL para insertar usuarios admin en la tabla 'usuarios'
            $sql = 'INSERT INTO usuarios (nombre, apellido, email, passwrd, administrador) 
                    VALUES (:nombre, :apellido, :email, :passwrd, :administrador)';

            // Preparar la consulta
            $stmt = $db->prepare($sql);

            // Ejecutar la consulta con los valores correspondientes
            return $stmt->execute([
                ':nombre' => $this->getNombre(),
                ':apellido' => $this->getApellido(),
                ':email' => $this->getEmail(),
                ':password' => $hashed_password,
                ':administrador' => 1 // Este campo es 1 para admin
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>