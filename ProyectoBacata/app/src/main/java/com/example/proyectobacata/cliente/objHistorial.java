package com.example.proyectobacata.cliente;

public class objHistorial {
    int id_reserva;
    String fecha_reserva;
    String fechaInicio_reserva;
    String fechaFinal_reserva;
    int Vhabitaciones_reserva;
    int Vservicios_reserva;
    int id_usuario;
    int id_hotel;

    public objHistorial() {
        this.id_reserva = 0;
        this.fecha_reserva = "";
        this.fechaInicio_reserva = "";
        this.fechaFinal_reserva = "";
        this.Vhabitaciones_reserva = 0;
        this.Vservicios_reserva = 0;
        this.id_usuario = 0;
        this.id_hotel = 0;
    }

}
