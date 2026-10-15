<?php

namespace App\Models;

class CompaniaAerea
{
    private string $nombre;
    /** @var Avion[] */
    private array $aviones = [];

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /** @return Avion[] */
    public function getAviones(): array
    {
        return $this->aviones;
    }

    public function agregarAvion(Avion $avion): void
    {
        $this->aviones[] = $avion;
    }
}