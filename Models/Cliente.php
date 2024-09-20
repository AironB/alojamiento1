<?php
class Cliente extends Usuario{
    public function __construct(
        int $id_usuario,
        string $nombre,
        string $apellido,
        string $email,
        string $password
    )
    {
        parent::__construct($id_usuario,$nombre,$apellido,$email,$password,false); //admin = false
    }

    #Implementacion del metodo abstracto
    public function crearUsuario(): void
    {
        #codigo para crear en db
    }
    // Método para editar los datos del usuario
    // public function editarUsuario(string $nombre, string $apellido, string $email): void {
    //     $this->setNombre($nombre);
    //     $this->setApellido($apellido);
    //     $this->setEmail($email);
    //     #codigo para actualizar en db
    // }
}
/**Este código debe ir en un archivo dedicado al registro de usuarios. Este archivo se llamará cuando
 * el usuario envíe el formulario de registro desde la vista de creación de cuentas. */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Crear un nuevo cliente
    $cliente = new Cliente($id_usuario, $nombre, $apellido, $email, $password); // Creación del cliente
    if ($cliente->crearUsuario($db)) {
        echo "<script>Swal.fire('Success', 'Usuario registrado exitosamente', 'success');</script>";
    } else {
        echo "<script>Swal.fire('Error', 'Fallo alregistrar usuario', 'error');</script>";
    }
}
?>