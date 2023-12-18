<?php

declare(strict_types=1);

###############################################################################################################
###############################################################################################################
##                                                                                                           ##
##  ######################     #####            #####     #####            #####     ######################  ##
##  ######################     #####            #####     #####            #####     ######################  ##
##  ######################     ######           #####     #####            #####     ######################  ##
##  ######################     #######          #####     #####            #####     ######################  ##
##  ######################     ########         #####     #####            #####     ######################  ##
##  #####            #####     #########        #####     #####            #####     #####                   ##
##  #####            #####     ##########       #####     #####            #####     #####     .COM.BR       ##
##  #####            #####     ##### #####      #####     ######################     ######################  ##
##  #####            #####     #####  #####     #####     ######################     ######################  ##
##  ######################     #####   #####    #####     ######################     ######################  ##
##  ######################     #####    #####   #####     ######################     ######################  ##
##  ######################     #####     #####  #####     ######################     ######################  ##
##  ######################     #####      ##### #####     #####            #####                      #####  ##
##  ######################     #####       ##########     #####            #####                      #####  ##
##  #####                      #####        #########     #####            #####     ######################  ##
##  #####                      #####         ########     #####            #####     ######################  ##
##  #####                      #####          #######     #####            #####     ######################  ##
##  #####                      #####           ######     #####            #####     ######################  ##
##  #####                      #####            #####     #####            #####     ######################  ##
##                                                                                                           ##
###############################################################################################################
##                   TODOS OS DIREITOS RESERVADOS  O SENHOR E MEU PASTOR E NADA ME FALTARÁ                   ##
###############################################################################################################
###############################################################################################################
###############################################################################################################
##                                          INICIO CODIGO DE FONTE!                                          ##
###############################################################################################################

namespace Pnhs\ParserNF\Validators;

use Pnhs\ParserNF\Utils\Decimal;
use Pnhs\ParserNF\Utils\CNPJ;

/**
 * Grupo YA. Informações de Pagamento
 */
class Dest
{
    private ?string $CNPJ = null;
    private ?string $CPF = null;
    private ?string $idEstrangeiro = null;
    private ?string $xNome = null;

    private ?string $xLgr = null;
    private ?string $nro = null;
    private ?string $xCpl = null;
    private ?string $xBairro = null;
    private ?int $cMun = null;
    private ?string $xMun = null;
    private ?string $UF = null;
    private ?string $CEP = null;
    private ?int $cPais = null;
    private ?string $xPais = null;
    private ?string $fone = null;
    private string $indIEDest = '9';
    private ?string $IE = null;
    private ?string $ISUF = null;
    private ?string $IM = null;
    private ?string $email = null;


    public function __construct()
    {
    }

    /**
     * __get
    *
    * @param string $name
    * @return mixed
    */
    public function __get(string $name): mixed
    {
        $method = 'get' . ucfirst($name);
        if (method_exists(__CLASS__, $method)) {
            return $this->$method();
        }
        return $this->$name;
    }

    /**
     * __set
    *
    * @param string $name
    * @param mixed $value
    * @return void
    */
    public function __set(string $name, mixed $value): void
    {
        $method = 'set' . ucfirst($name);
        if (method_exists(__CLASS__, $method)) {
            $this->$method($value);
        } else {
            $this->$name = $value;
        }
    }

    // private function setCnpj(string $value): void
    // {

    //     if ((new CNPJ())->run($value)) {
    //         $this->CNPJ = $value;
    //     }
    // }
}
