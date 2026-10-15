<?php

use App\Models\Aeropuerto;
use App\Models\Avion;
use App\Models\CompaniaAerea;
use App\Models\Vuelo;

test('la compañía guarda su nombre y empieza sin aviones', function () {
    $compania = new CompaniaAerea('Avianca');

    expect($compania->getNombre())->toBe('Avianca')
        ->and($compania->getAviones())->toBeEmpty();
});

test('el aeropuerto guarda su código y su nombre', function () {
    $aeropuerto = new Aeropuerto('LIR', 'Daniel Oduber Quirós');

    expect($aeropuerto->getCodigo())->toBe('LIR')
        ->and($aeropuerto->getNombre())->toBe('Daniel Oduber Quirós');
});

test('el avión guarda su matrícula y su compañía', function () {
    $compania = new CompaniaAerea('Avianca');
    $avion = new Avion('TI-001', $compania);

    expect($avion->getMatricula())->toBe('TI-001')
        ->and($avion->getCompania())->toBe($compania)
        ->and($avion->getVuelos())->toBeEmpty();
});

test('la compañía maneja los aviones que se crean con ella', function () {
    $compania = new CompaniaAerea('Avianca');
    $avion1 = new Avion('TI-001', $compania);
    $avion2 = new Avion('TI-002', $compania);

    expect($compania->getAviones())->toHaveCount(2)
        ->and($compania->getAviones()[0])->toBe($avion1)
        ->and($compania->getAviones()[1])->toBe($avion2);
});

test('el vuelo guarda su número, su avión, su origen y su destino', function () {
    $avion = new Avion('TI-001', new CompaniaAerea('Avianca'));
    $origen = new Aeropuerto('LIR', 'Daniel Oduber Quirós');
    $destino = new Aeropuerto('SJO', 'Juan Santamaría');

    $vuelo = new Vuelo('AV100', $avion, $origen, $destino);

    expect($vuelo->getNumeroVuelo())->toBe('AV100')
        ->and($vuelo->getAvion())->toBe($avion)
        ->and($vuelo->getOrigen())->toBe($origen)
        ->and($vuelo->getDestino())->toBe($destino);
});

test('el origen y el destino del vuelo son aeropuertos distintos', function () {
    $avion = new Avion('TI-001', new CompaniaAerea('Avianca'));
    $origen = new Aeropuerto('LIR', 'Daniel Oduber Quirós');
    $destino = new Aeropuerto('SJO', 'Juan Santamaría');

    $vuelo = new Vuelo('AV100', $avion, $origen, $destino);

    expect($vuelo->getOrigen())->not->toBe($vuelo->getDestino());
});

test('el avión realiza los vuelos que se crean con él', function () {
    $avion = new Avion('TI-001', new CompaniaAerea('Avianca'));
    $lir = new Aeropuerto('LIR', 'Daniel Oduber Quirós');
    $sjo = new Aeropuerto('SJO', 'Juan Santamaría');

    $vuelo1 = new Vuelo('AV100', $avion, $lir, $sjo);
    $vuelo2 = new Vuelo('AV101', $avion, $sjo, $lir);

    expect($avion->getVuelos())->toHaveCount(2)
        ->and($avion->getVuelos()[0])->toBe($vuelo1)
        ->and($avion->getVuelos()[1])->toBe($vuelo2);
});

test('varios vuelos pueden compartir el mismo aeropuerto', function () {
    $avion = new Avion('TI-001', new CompaniaAerea('Avianca'));
    $lir = new Aeropuerto('LIR', 'Daniel Oduber Quirós');
    $sjo = new Aeropuerto('SJO', 'Juan Santamaría');

    $vuelo1 = new Vuelo('AV100', $avion, $lir, $sjo);
    $vuelo2 = new Vuelo('AV101', $avion, $lir, $sjo);

    expect($vuelo1->getOrigen())->toBe($vuelo2->getOrigen())
        ->and($vuelo1->getDestino())->toBe($vuelo2->getDestino());
});