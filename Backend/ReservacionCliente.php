<?php
require_once '../Backend/Reservacion.php';
class ReservacionCliente extends Reservacion {

    // Constructor
    public function __construct(
        ?int $id_reservacion,
        int $id_usuario, 
        int $id_alojamiento, 
        DateTime $fecha_entrada, 
        DateTime $fecha_salida, 
        int $cantidad_personas, 
        string $comentarios,
        bool $estado = true
        ) {
        parent::__construct($id_reservacion, $id_usuario, $id_alojamiento, $fecha_entrada, $fecha_salida, $cantidad_personas, $comentarios, $estado);
    }

    // Método para crear una reservación
    public function crearReservacion(PDO $db): bool {
        try {
            //consulta sql
            $sql = "INSERT INTO reservaciones (id_usuario, id_alojamiento, fecha_entrada, fecha_salida, cantidad_personas, comentarios, estado)
            VALUES (:id_usuario, :id_alojamiento, :fecha_entrada, :fecha_salida, :cantidad_personas, :comentarios, :estado)" ;
            //preparar la consulta
            $stmt = $db->prepare($sql);
            //ejecutar la consulta con los valores correspondientes
            $stmt->execute([
                'id_usuario' => $this->getIdUsuario(),
                'id_alojamiento' => $this->getIdAlojamiento(),
                'fecha_entrada' => $this->getFechaEntrada()->format('Y-m-d'),
                'fecha_salida' => $this->getFechaSalida()->format('Y-m-d'),
                'cantidad_personas' => $this->getCantidadPersonas(),
                'comentarios' => $this->getComentarios(),
                'estado' => $this->getEstado() // true por defecto
            ]);
            return true; // Reservación creada correctamente
        } catch (PDOException $e) {
            // Error al crear la reservación
            echo "Error: ". $e->getMessage();
            return false;
        }    
    }

    // Método para cancelar la reservación
    public function cancelarReservacion(PDO $db): bool {
        try {
            // Consulta sql
            $sql = "UPDATE reservaciones SET estado = false WHERE id_reservacion = :id_reservacion AND id_usuario = :id_usuario" ;
            // Preparar la consulta
            $stmt = $db->prepare($sql);
            // Ejecutar la consulta con los valores correspondientes
            $stmt->execute([
                'id_reservacion' => $this->getIdReservacion(),
                'id_usuario' => $this->getIdUsuario()
            ]);
            return true; // Reservación cancelada correctamente
        } catch (PDOException $e) {
            // Error al cancelar la reservación
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    // Método para editar la reservación
    public function editarReservacion(PDO $db): bool {
        try {
            // Consulta sql
            $sql = "UPDATE reservaciones SET fecha_entrada = :fecha_entrada, fecha_salida = :fecha_salida, cantidad_personas = :cantidad_personas, comentarios = :comentarios WHERE id_reservacion = :id_reservacion" ;
            // Preparar la consulta
            $stmt = $db->prepare($sql);
            // Ejecutar la consulta con los valores correspondientes
            $stmt->execute([
                'fecha_entrada' => $this->getFechaEntrada()->format('Y-m-d'),
                'fecha_salida' => $this->getFechaSalida()->format('Y-m-d'),
                'cantidad_personas' => $this->getCantidadPersonas(),
                'comentarios' => $this->getComentarios(),
                'id_reservacion' => $this->getIdReservacion()
            ]);
            return true; // Reservación editada correctamente
        } catch (PDOException $e) {
            // Error al editar la reservación
            echo "Error: ". $e->getMessage();
            return false;
        }    
    }
}
?>