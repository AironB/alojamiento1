<?php
class ReservacionCliente extends Reservacion {

    // Constructor
    public function __construct(
        int $id_reservacion,
        int $id_usuario, 
        int $id_alojamiento, 
        DateTime $fecha_entrada, 
        DateTime $fecha_salida, 
        int $cantidad_personas, 
        string $comentarios) {
        parent::__construct($id_reservacion, $id_usuario, $id_alojamiento, $fecha_entrada, $fecha_salida, $cantidad_personas, $comentarios);
    }

    // Método para crear una reservación
    public function crearReservacion(): void {
        // Código para insertar la reservación en la base de datos
        $this->setEstado(true); // Reservación activa por defecto
    }

    // Método para cancelar la reservación
    public function cancelarReservacion(): void {
        $this->setEstado(false); // Cambiar el estado a false (cancelada)
        // Código para actualizar en la base de datos
    }

    // Método para editar la reservación
    public function editarReservacion(DateTime $nueva_fecha_entrada, DateTime $nueva_fecha_salida, int $nueva_cantidad_personas, string $nuevos_comentarios): void {
        $this->setFechaEntrada($nueva_fecha_entrada);
        $this->setFechaSalida($nueva_fecha_salida);
        $this->setCantidadPersonas($nueva_cantidad_personas);
        $this->setComentarios($nuevos_comentarios);
        // Código para actualizar la base de datos
    }
}


?>