# parserNF
O parserNF é uma biblioteca de código aberto para facilitar a importação de Notas Fiscal Modelo 55 e 65.

### Instalação

Recomendamos que faça a instalação através do **Composer**

```
$ composer require pnhs/parserNF
```
## Atenção

Esta biblioteca é apenas para facilitar a conversão do XML da nota fiscal para facilitar a importação e não faz validação de campos como por exemplo se a chave referenciada, numero de CPF ou CNPJ são validos (talvez implementemos em versões futuras)

## Uso
A biblioteca é pensada em ser simples é retornar apenas os grupos que realmente você precisa, um exemplo retornando o grupo B - Identificação da Nota Eletrônica
```php
use Pnhs\ParserNF\layout\b;
use Pnhs\ParserNF\Parser;

if (!file_exists("nota_fiscal.xml")) die("Arquivo nota_fiscal.xml não existe");
$xml = file_get_contents("nota_fiscal.xml");

$parser = new parser($xml);
$p = $parser->read();

$group_b = b::run($p);

print_r($group_b);

/*
Retorno:
stdClass Object
(
    [cUF] => Pnhs\ParserNF\enums\Uf Enum:int
        (
            [name] => MG
            [value] => 31
        )

    [cNF] => 25550552
    [natOp] => Cupom Fiscal Emitido
    [mod] => Pnhs\ParserNF\enums\Mod Enum:string
        (
            [name] => NF_E
            [value] => 55
        )

    [serie] => 1
    [nNF] => 20
    [dhEmi] => 2023-05-11T11:25:00-03:00
    [dhSaiEnt] => 
    [tpNF] => Pnhs\ParserNF\enums\TpNF Enum:int
        (
            [name] => SAIDA
            [value] => 1
        )

    [idDest] => Pnhs\ParserNF\enums\IdDest Enum:int
        (
            [name] => OPERACAO_INTERNA
            [value] => 1
        )

    [cMunFG] => 3152105
    [tpImp] => Pnhs\ParserNF\enums\TpImp Enum:int
        (
            [name] => DANFE_NORMAL_RETRATO
            [value] => 1
        )

    [tpEmis] => Pnhs\ParserNF\enums\TpEmis Enum:int
        (
            [name] => NORMAL
            [value] => 1
        )

    [cDV] => 5
    [tpAmb] => Pnhs\ParserNF\enums\TpAmb Enum:int
        (
            [name] => PRODUCAO
            [value] => 1
        )

    [finNFe] => Pnhs\ParserNF\enums\FinNFe Enum:int
        (
            [name] => NORMAL
            [value] => 1
        )

    [indFinal] => Pnhs\ParserNF\enums\IndFinal Enum:int
        (
            [name] => CONSUMIDOR_FINAL
            [value] => 1
        )

    [indPres] => Pnhs\ParserNF\enums\IndPres Enum:int
        (
            [name] => OUTROS
            [value] => 9
        )

    [indIntermed] => Pnhs\ParserNF\enums\IndIntermed Enum:int
        (
            [name] => SEM_INTERMEDIADOR
            [value] => 0
        )

    [procEmi] => Pnhs\ParserNF\enums\ProcEmi Enum:int
        (
            [name] => APLICATIVO_CONTRIBUINTE
            [value] => 0
        )

    [verProc] => 0.1.0
    [dhCont] => 
    [xJust] => 
)
*/
```

## Fácil neh? Vamos fazer um teste?
Abra seu terminal ou powershell é execute o seguinte código

```
$ git clone git@github.com:seraf-im/parserNF.git
$ cd parserNF
$ composer install
$ cd examples
$ php -S localhost:1231
```

Abra seu navegador e acesse o endereço **localhost:1231**, veja como é simples a utilização

## Se puder faça uma doação!
[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/***)
https://pag.ae/***

## Hum, encontrou um problema ou falha de segurança?
Pedimos que contribua com o projeto abrindo uma issue explicando o problema ou falha de segurança encontrado e os passos para chegar neste resultado, se tiver conhecimento tecnico você tambem pode abrir a PR com as correções necessárias