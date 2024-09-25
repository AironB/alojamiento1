<?php
abstract class Reservacion{
    protected ?int $id_reservacion;
    protected int $id_usuario;
    protected int $id_alojamiento;
    protected DateTime $fecha_entrada;
    protected DateTime $fecha_salida;
    protected int $cantidad_personas;
    protected string $comentarios;
    protected bool $estado;

    //constructor
    public function __construct(
        ?int $id_reservacion,
        int $id_usuario,
        int $id_alojamiento,
        DateTime $fecha_entrada,
        DateTime $fecha_salida,
        int $cantidad_personas,
        string $comentarios,
        bool $estado = true
    )
    {
        $this->setIdReservacion($id_reservacion);
        $this->setIdUsuario($id_usuario);
        $this->setIdAlojamiento($id_alojamiento);
        $this->setFechaEntrada($fecha_entrada);
        $this->setFechaSalida($fecha_salida);
        $this->setCantidadPersonas($cantidad_personas);
        $this->setComentarios($comentarios);
        $this->setEstado($estado);
    }
    // Getters y Setters
    public function getIdReservacion(): ?int {
        return $this->id_reservacion;
    }

    public function setIdReservacion(?int $id_reservacion): void {
        $this->id_reservacion = $id_reservacion;
    }

    // Getters y Setters para id_usuario
    public function getIdUsuario(): int {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    // Getters y Setters para id_alojamiento
    public function getIdAlojamiento(): int {
        return $this->id_alojamiento;
    }

    public function setIdAlojamiento(int $id_alojamiento): void {
        $this->id_alojamiento = $id_alojamiento;
    }
    public function getFechaEntrada(): DateTime {
        return $this->fecha_entrada;
    }

    public function setFechaEntrada(DateTime $fecha_entrada): void {
        $this->fecha_entrada = $fecha_entrada;
    }

    public function getFechaSalida(): DateTime {
        return $this->fecha_salida;
    }

    public function setFechaSalida(DateTime $fecha_salida): void {
        $this->fecha_salida = $fecha_salida;
    }

    public function getCantidadPersonas(): int {
        return $this->cantidad_personas;
    }

    public function setCantidadPersonas(int $cantidad_personas): void {
        $this->cantidad_personas = $cantidad_personas;
    }

    public function getComentarios(): string {
        return $this->comentarios;
    }

    public function setComentarios(string $comentarios): void {
        $this->comentarios = $comentarios;
    }

    public function getEstado(): bool {
        return $this->estado;
    }

    public function setEstado(bool $estado): void {
        $this->estado = $estado;
    }
    #mostrar reservaciones segun ID usuario
    public static function mostrarReservacionesPorUsuario(PDO $db, int $id_usuario):array {
        try{
            $sql = "SELECT  reservaciones.id_reservacion, usuarios.nombre as nombre_cliente, usuarios.apellido, usuarios.email, reservaciones.id_alojamiento, alojamientos.nombre_alojamiento,alojamientos.ubicacion, tipo_alojamientos.nombre as tipo_alojamiento, alojamientos.precio, reservaciones.fecha_entrada, reservaciones.fecha_salida, reservaciones.cantidad_personas, reservaciones.comentarios,
                    CASE WHEN   reservaciones.estado = 1 THEN   'Reservación Confirmada' ELSE 'Reservación Cancelada' END AS estado_reservacion
                    FROM reservaciones 
                    INNER JOIN usuarios on reservaciones.id_usuario = usuarios.id_usuario 
                    INNER JOIN alojamientos on reservaciones.id_alojamiento = alojamientos.id_alojamiento
                    INNER JOIN tipo_alojamientos on alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento
                    WHERE reservaciones.id_usuario = :id_usuario AND reservaciones.estado = true";
                    // preparar la consulta
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
                    // ejecutar la consulta
                    $stmt->execute();
                    //obtener los resultados
                    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //devolver los resultados
                    return $resultados;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    //mostrar reservaciones
    public static function mostrarReservaciones(PDO $db): array{
        try{
            $sql = "SELECT usuarios.nombre as nombre_cliente, usuarios.apellido, usuarios.email, alojamientos.imagen, alojamientos.nombre_alojamiento, alojamientos.ubicacion, tipo_alojamientos.nombre as tipo_alojamiento, alojamientos.precio, reservaciones.fecha_entrada, reservaciones.fecha_salida, reservaciones.cantidad_personas, reservaciones.comentarios,
                    CASE WHEN   reservaciones.estado = 1 THEN   'Reservación Confirmada' ELSE 'Reservación Cancelada' END AS estado_reservacion
                    FROM reservaciones 
                    INNER JOIN usuarios on reservaciones.id_usuario = usuarios.id_usuario 
                    INNER JOIN alojamientos on reservaciones.id_alojamiento = alojamientos.id_alojamiento
                    INNER JOIN tipo_alojamientos on alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento";
                    // ejecutar la consulta
                    $stmt = $db->query($sql);
                    //obtener los resultados
                    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //devolver los resultados
                    return $resultados;
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            return [];
        }    
    }
    // Método abstracto para cancelar la reservación
    abstract public function cancelarReservacion(PDO $db): bool;
}

?>