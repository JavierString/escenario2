<?php

namespace App\Models;

class Avion
{
    private string $matricula;
    private CompaniaAerea $compania;
    /** @var Vuelo[] */
    private array $vuelos = [];

    public function __construct(string $matricula, CompaniaAerea $compania)
    {
        $this->matricula = $matricula;
        $this->compania = $compania;
        $compania->agregarAvion($this);
    }

    public function getMatricula(): string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): void
    {
        $this->matricula = $matricula;
    }

    public function getCompania(): CompaniaAerea
    {
        return $this->compania;
    }

    public function setCompania(CompaniaAerea $compania): void
    {
        $this->compania = $compania;
    }

    /** @return Vuelo[] */
    public function getVuelos(): array
    {
        return $this->vuelos;
    }

    public function agregarVuelo(Vuelo $vuelo): void
    {
        $this->vuelos[] = $vuelo;
    }
}