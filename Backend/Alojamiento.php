<?php
class Alojamiento {
    private int $id_alojamiento;
    private string $nombre;
    private string $descripcion;
    private string $ubicacion;
    private float $precio;
    private bool $estado;
    private string $imagen;
    private int $id_tipo_alojamiento;

    // Constructor
    public function __construct(int $id_alojamiento, string $nombre, string $descripcion, string $ubicacion, float $precio, bool $estado, string $imagen, int $id_tipo_alojamiento) {
        $this->id_alojamiento = $id_alojamiento;
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setUbicacion($ubicacion);
        $this->setPrecio($precio);
        $this->setEstado($estado);
        $this->setImagen($imagen);
        $this->setIdTipoAlojamiento($id_tipo_alojamiento);
    }

    // Getters y Setters
    public function getIdAlojamiento(): int {
        return $this->id_alojamiento;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getUbicacion(): string {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): void {
        $this->ubicacion = $ubicacion;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }

    public function getEstado(): bool {
        return $this->estado;
    }

    public function setEstado(bool $estado): void {
        $this->estado = $estado;
    }

    public function getImagen(): string {
        return $this->imagen;
    }

    public function setImagen(string $imagen): void {
        $this->imagen = $imagen;
    }

    public function getIdTipoAlojamiento(): int {
        return $this->id_tipo_alojamiento;
    }

    public function setIdTipoAlojamiento(int $id_tipo_alojamiento): void {
        $this->id_tipo_alojamiento = $id_tipo_alojamiento;
    }

    // Métodos para gestionar el alojamiento
    public function crearAlojamiento(): void {
        // Código para insertar alojamiento en la base de datos
    }

    public function editarAlojamiento(string $nombre, string $descripcion, string $ubicacion, float $precio, string $imagen): void {
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setUbicacion($ubicacion);
        $this->setPrecio($precio);
        $this->setImagen($imagen);
        // Código para actualizar en la base de datos
    }

    public function eliminarAlojamiento(): void {
        $this->setEstado(false);
        // Código para actualizar el estado en la base de datos
    }

    public function actualizarEstado(bool $estado): void {
        $this->setEstado($estado);
        // Código para actualizar el estado en la base de datos
    }
}
?>