<?php

use Pnhs\ParserNF\Validators\NVE;
use Pnhs\ParserNF\Validators\Prod;

test('Valor bruto somado internamente', function () {

    $prod = new Prod();

    $prod->qCom = "5";
    $prod->vUnCom = "5";

    expect($prod->vProd)->toBe('25.00');
});

test('Valor bruto passado manualmente', function () {

    $prod = new Prod();

    $prod->qCom = "5";
    $prod->vUnCom = "5";
    $prod->vProd = "15";

    expect($prod->vProd)->toBe('15.00');
});

test('Codificação NVE', function () {

    $prod   = new Prod();
    $nve    = new NVE();
    $nve->addNVE('AB1234')
    // ->addNVE('BC2345')
    // ->addNVE('CD3456')
    // ->addNVE('DE4567')
    // ->addNVE('EF5678')
    // ->addNVE('FG6789')
    ->addNVE('GH7890');

    $prod->NVE = $nve;

    expect($prod->NVE)->toBe([
        'AB1234','GH7890'
    ]);
});

test('Codificação Vazia', function () {

    $prod   = new Prod();

    expect($prod->NVE)->toBe([

    ]);
});
