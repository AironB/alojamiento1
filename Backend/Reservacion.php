<?php
abstract class Reservacion{
    protected int $id_reservacion;
    protected int $id_usuario;
    protected int $id_alojamiento;
    protected DateTime $fecha_entrada;
    protected DateTime $fecha_salida;
    protected int $cantidad_personas;
    protected string $comentarios;
    protected bool $estado;

    //constructor
    public function __construct(
        int $id_reservacion,
        int $id_usuario,
        int $id_alojamiento,
        DateTime $fecha_entrada,
        DateTime $fecha_salida,
        int $cantidad_personas,
        string $comentarios,
        bool $estado = true
    )
    {
        $this->id_reservacion = $id_reservacion;
        $this->id_usuario = $id_usuario;
        $this->id_alojamiento = $id_alojamiento;
        $this->setFechaEntrada($fecha_entrada);
        $this->setFechaSalida($fecha_salida);
        $this->setCantidadPersonas($cantidad_personas);
        $this->setComentarios($comentarios);
        $this->setEstado($estado);
    }
    // Getters y Setters para DateTime
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

    // Otros getters y setters
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

    // Método abstracto para cancelar la reservación
    abstract public function cancelarReservacion(): void;
}

?>