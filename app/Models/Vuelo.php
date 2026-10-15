<?php

namespace App\Models;

class Vuelo
{
    private string $numeroVuelo;
    private Avion $avion;
    private Aeropuerto $origen;
    private Aeropuerto $destino;

    public function __construct(
        string $numeroVuelo,
        Avion $avion,
        Aeropuerto $origen,
        Aeropuerto $destino
    ) {
        $this->numeroVuelo = $numeroVuelo;
        $this->avion = $avion;
        $this->origen = $origen;
        $this->destino = $destino;
        $avion->agregarVuelo($this);
    }

    public function getNumeroVuelo(): string
    {
        return $this->numeroVuelo;
    }

    public function setNumeroVuelo(string $numeroVuelo): void
    {
        $this->numeroVuelo = $numeroVuelo;
    }

    public function getAvion(): Avion
    {
        return $this->avion;
    }

    public function setAvion(Avion $avion): void
    {
        $this->avion = $avion;
    }

    public function getOrigen(): Aeropuerto
    {
        return $this->origen;
    }

    public function setOrigen(Aeropuerto $origen): void
    {
        $this->origen = $origen;
    }

    public function getDestino(): Aeropuerto
    {
        return $this->destino;
    }

    public function setDestino(Aeropuerto $destino): void
    {
        $this->destino = $destino;
    }
}