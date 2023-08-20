<?php

use Pnhs\ParserNF\Validators\DetPag;
use Pnhs\ParserNF\Validators\Icms;
use Pnhs\ParserNF\Validators\NFe;
use Pnhs\ParserNF\Validators\NVE;
use Pnhs\ParserNF\Validators\Prod;

test('Valor bruto somado internamente', function () {

    $nfe = new NFe();

    $prod = new Prod();
    $prod->qCom = "1";
    $prod->vUnCom = "40";
    $icms = new Icms();
    $icms->orig = "0";
    $nfe->addProd($prod, icms: $icms);

    $prod = new Prod();
    $prod->qCom = "1";
    $prod->vUnCom = "60";
    $nfe->addProd($prod, icms: $icms);

    $detPag = new DetPag();
    $detPag->vPag = '120.00';
    $nfe->detPag = $detPag;

    $nfe->vFrete = "6";
    $nfe->vSeg = "8";
    $nfe->vDesc = "14";
    $nfe->vOutro = "10";

    $nfe->result();

    expect("10.01")->toBe('10.01');
});
