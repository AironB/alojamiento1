<?php
class Alojamiento
{
    private ?int $id_alojamiento;
    private string $nombre;
    private string $descripcion;
    private string $ubicacion;
    private float $precio;
    private bool $estado;
    private string $imagen;
    private int $id_tipo_alojamiento;

    // Constructor
    public function __construct(?int $id_alojamiento, string $nombre, string $descripcion, string $ubicacion, float $precio, bool $estado, string $imagen, int $id_tipo_alojamiento)
    {
        $this->setIdAlojamiento($id_alojamiento);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setUbicacion($ubicacion);
        $this->setPrecio($precio);
        $this->setEstado($estado);
        $this->setImagen($imagen);
        $this->setIdTipoAlojamiento($id_tipo_alojamiento);
    }

    // Getters y Setters
    public function getIdAlojamiento(): ?int
    {
        return $this->id_alojamiento;
    }

    public function setIdAlojamiento(?int $id_alojamiento): void
    {
        $this->id_alojamiento = $id_alojamiento;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getUbicacion(): string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): void
    {
        $this->ubicacion = $ubicacion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function getEstado(): bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): void
    {
        $this->estado = $estado;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getIdTipoAlojamiento(): int
    {
        return $this->id_tipo_alojamiento;
    }

    public function setIdTipoAlojamiento(int $id_tipo_alojamiento): void
    {
        $this->id_tipo_alojamiento = $id_tipo_alojamiento;
    }

    // Métodos para gestionar el alojamiento
    public function alternarEstado(PDO $db): bool
    {
        try {
            // Obtener el estado actual del alojamiento
            $sql = "SELECT estado FROM alojamientos WHERE id_alojamiento = :id_alojamiento";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id_alojamiento' => $this->getIdAlojamiento()]);
            $estado_actual = $stmt->fetchColumn();

            // Alternar el estado: Si es 1, cambiar a 0; si es 0, cambiar a 1
            $nuevo_estado = $estado_actual == 1 ? 0 : 1;

            // Actualizar el estado del alojamiento
            $sql_update = "UPDATE alojamientos SET estado = :estado WHERE id_alojamiento = :id_alojamiento";
            $stmt_update = $db->prepare($sql_update);
            $stmt_update->execute([
                ':estado' => $nuevo_estado,
                ':id_alojamiento' => $this->getIdAlojamiento()
            ]);

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    #mostrar Alojamiento
    public static function MostrarAlojamiento(PDO $db): array
    {
        //consulta sql para mostrar alojamiento
        try {
            $sql = "SELECT alojamientos.id_alojamiento, alojamientos.nombre_alojamiento, alojamientos.imagen, alojamientos.descripcion, 
                        alojamientos.ubicacion, alojamientos.precio, 
                        CASE WHEN alojamientos.estado = 1 THEN 'Alojamiento disponible' 
                        ELSE 'Alojamiento no disponible' END AS estado_alojamiento, 
                        tipo_alojamientos.nombre AS tipo_alojamiento
                FROM alojamientos
                INNER JOIN tipo_alojamientos 
                ON alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento";
            //Ejecutar la consulta
            $stmt = $db->query($sql);
            //Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    #mostrar Alojamiento por ID
    public static function MostrarAlojamientoPorId(PDO $db, $id_alojamiento): array
    {
        //consulta sql para mostrar alojamiento
        try {
            $sql = "SELECT alojamientos.id_alojamiento, alojamientos.nombre_alojamiento, alojamientos.imagen, alojamientos.descripcion, 
                        alojamientos.ubicacion, alojamientos.precio, 
                        CASE WHEN alojamientos.estado = 1 THEN 'Alojamiento disponible' 
                        ELSE 'Alojamiento no disponible' END AS estado_alojamiento, 
                        tipo_alojamientos.nombre AS tipo_alojamiento
                FROM alojamientos
                INNER JOIN tipo_alojamientos 
                ON alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento WHERE alojamientos.id_alojamiento = :id_alojamiento";
            // Preparar la consulta
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_alojamiento', $id_alojamiento, PDO::PARAM_INT); // Protección contra inyecciones SQL
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC); // fetch en lugar de fetchAll para obtener solo un registro
            return $resultados ?: []; // Retorna un arreglo vacío si no encuentra resultados
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    #administrador puede crear el alojamiento
    public function crearAlojamiento(PDO $db): bool
    {
        try {
            //consulta SQL para insertar alojamientos
            $sql = "INSERT INTO alojamientos (nombre_alojamiento,imagen, descripcion, ubicacion, precio, estado, id_tipo_alojamiento) 
            VALUES (:nombre, :imagen, :descripcion, :ubicacion, :precio, :estado, :id_tipo_alojamiento);";
            //Preparar la consulta
            $stmt = $db->prepare($sql);
            //ejecutar la consulta con los valores correspondientes
            $stmt->execute([
                ':nombre' => $this->getNombre(),
                ':imagen' => $this->getImagen(),
                ':descripcion' => $this->getDescripcion(),
                ':ubicacion' => $this->getUbicacion(),
                ':precio' => $this->getPrecio(),
                ':estado' => $this->getEstado(),
                ':id_tipo_alojamiento' => $this->getIdTipoAlojamiento()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    #administrador puede editar alojamiento
    public function editarAlojamiento(PDO $db): bool
    {
        try {
            // Validar que el tipo de alojamiento existe
            $id_tipo_alojamiento = $this->getIdTipoAlojamiento();
            $sqlCheck = "SELECT COUNT(*) FROM tipo_alojamientos WHERE id_tipo_alojamiento = :id_tipo_alojamiento";
            $stmtCheck = $db->prepare($sqlCheck);
            $stmtCheck->execute([':id_tipo_alojamiento' => $id_tipo_alojamiento]);
            $count = $stmtCheck->fetchColumn();
            
            if ($count == 0) {
                throw new Exception("Error: El tipo de alojamiento con ID $id_tipo_alojamiento no existe.");
            }
    
            // Consulta SQL para editar alojamiento
            $sql = "UPDATE alojamientos SET nombre_alojamiento = :nombre, imagen = :imagen, descripcion = :descripcion, ubicacion = :ubicacion, precio = :precio, estado = :estado, id_tipo_alojamiento = :id_tipo_alojamiento WHERE id_alojamiento = :id_alojamiento";
            
            // Preparar la consulta
            $stmt = $db->prepare($sql);
            
            // Ejecutar la consulta con los valores correspondientes
            $stmt->execute([
                ':nombre' => $this->getNombre(),
                ':imagen' => $this->getImagen(),
                ':descripcion' => $this->getDescripcion(),
                ':ubicacion' => $this->getUbicacion(),
                ':precio' => $this->getPrecio(),
                ':estado' => $this->getEstado(),
                ':id_tipo_alojamiento' => $this->getIdTipoAlojamiento(),
                ':id_alojamiento' => $this->getIdAlojamiento()
            ]);
    
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    #administrador puede editar solo el estado del alojamiento
    public function actualizarEstado(PDO $db, bool $estado): bool
{
    try {
        // Consulta SQL para actualizar el estado de un alojamiento
        $sql = "UPDATE alojamientos SET estado = :estado WHERE id_alojamiento = :id_alojamiento";
        // Preparar la consulta
        $stmt = $db->prepare($sql);
        // Ejecutar la consulta con los valores correspondientes
        $stmt->execute([
            ':estado' => $estado,
            ':id_alojamiento' => $this->getIdAlojamiento()
        ]);
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

    #aministrador puede eliminar un alojamiento
    public function eliminarAlojamiento(PDO $db): bool
    {
        try {
            //consulta sql para eliminar un alojamiento
            $sql = "DELETE FROM alojamientos WHERE id_alojamiento = :id_alojamiento";
            //preparar la consulta
            $stmt = $db->prepare($sql);
            //ejecutar la consulta con los valores correspondientes
            $stmt->execute([
                ':id_alojamiento' => $this->getIdAlojamiento()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
