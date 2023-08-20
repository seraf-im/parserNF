<?php

use Pnhs\ParserNF\Validators\DetPag;

test('Identificação de Forma de Pagamento Padrão', function () {

    $detPag = new DetPag();

    expect($detPag->indPag)->toBe(0);
});

test('Identificação de Forma de Pagamento', function () {

    $detPag = new DetPag();

    $detPag->indPag = 1;

    expect($detPag->indPag)->toBe(1);
});

test('Meio de Pagamento Padrão', function () {

    $detPag = new DetPag();

    expect($detPag->tPag)->toBe("01");
});

test('Meio de Pagamento', function () {

    $detPag = new DetPag();

    $detPag->tPag = '3';

    expect($detPag->tPag)->toBe("03");
});

test('Valor do Pagamento', function () {

    $detPag = new DetPag();

    $detPag->vPag = '3';

    expect($detPag->vPag)->toBe("3.00");
});

test('Tipo de Integração Para Pagamento Padrão', function () {

    $detPag = new DetPag();

    expect($detPag->tpIntegra)->toBe(2);
});

test('Tipo de Integração Para Pagamento', function () {

    $detPag = new DetPag();

    $detPag->tpIntegra = 1;

    expect($detPag->tpIntegra)->toBe(1);
});

test('CNPJ instituição de pagamento', function () {

    $detPag = new DetPag();

    $detPag->CNPJ = '49022455000105';

    expect($detPag->CNPJ)->toBe('49022455000105');
});

test('Bandeira da operadora de cartão de crédito e/ou débito', function () {

    $detPag = new DetPag();

    $detPag->tBand = '1';

    expect($detPag->tBand)->toBe('01');
});

test('Numero de autorização da operação cartão de crédito e/ou débito', function () {

    $detPag = new DetPag();

    $detPag->cAut = 'ABC1234';

    expect($detPag->cAut)->toBe('ABC1234');
});
