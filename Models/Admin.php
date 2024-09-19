<?php
class Admin extends Usuario{
    public function __construct(
        int $id_usuario,
        string $nombre,
        string $apellido,
        string $email,
        string $password
    )
    {
        parent::__construct($id_usuario,$nombre,$apellido,$email,$password,true); //admin = true
    }

    #Implementacion del metodo abstracto
    public function crearUsuario(): void
    {
        #codigo para crear en db
    }
    // Método para editar los datos del usuario
    public function editarUsuario(string $nombre, string $apellido, string $email): void {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setEmail($email);
        #codigo para actualizar en db
    }
}

?>