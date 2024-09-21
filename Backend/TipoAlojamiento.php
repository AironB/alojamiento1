<?php
class TipoAlojamiento{
    private ?int $id_tipo_alojamiento;
    private string $nombre;

    // Constructor
    public function __construct(?int $id_tipo_alojamiento, string $nombre) {
        $this->id_tipo_alojamiento = $id_tipo_alojamiento;
        $this->setNombre($nombre);
    }

    // Getters y Setters
    public function getIdTipoAlojamiento():?int {
        return $this->id_tipo_alojamiento;
    }
    public function getNombre(): string {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
    // Métodos para obtener todos los tipos de alojamientos
    public static function obtenerTiposAlojamientos(PDO $db): array {
        $sql = "SELECT id_tipo_alojamiento, nombre FROM tipo_alojamientos";

        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #devuelve una lista de los tipos de alojamientos
    }
}
?>