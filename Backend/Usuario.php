<?php
/**
 * esta clase sera abstract ya que puede tener diferentess tipos de usuarios (cliente y admin)
 */
abstract class Usuario{
    protected int $id_usuario;
    protected string $nombre;
    protected string $apellido;
    protected string $email;
    protected string $password;
    protected bool $admin;

    #cconstruct
    public function __construct(
        int $id_usuario,
        string $nombre,
        string $apellido,
        string $email,
        string $password,
        bool $admin)
    {
        $this->setIdUsuario($id_usuario);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setEmail($email);
        $this->cifrarPassword($password);
        $this->setAdmin($admin);
    }

    //getter y setter
    public function getIdUsuario(): int {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        // Validar el formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidArgumentException("El formato del email es inválido.");
    }

    // Si el email es válido, asignarlo al atributo
    $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    protected function cifrarPassword(string $password): string {
        // Cifrar la contraseña usando password_hash
    return password_hash($password, PASSWORD_DEFAULT);
    }

    public function isAdmin(): bool {
        return $this->admin;
    }

    public function setAdmin(bool $admin): void {
        $this->admin = $admin;
    }
    //metodo para crear usuario
    abstract public function crearUsuario(): void;
}
?>