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

/**
 * Grupo C. Identificação do Emitente da Nota Fiscal eletrônica
 */
class Emit
{
    private ?string $CNPJ = null;
    private ?string $CPF = null;
    private string $xNome;
    private ?string $xFant = null;

    private string $xLgr;
    private string $nro;
    private ?string $xCpl = null;
    private string $xBairro;
    private int $cMun;
    private string $xMun;
    private string $UF;
    private string $CEP;
    private ?int $cPais = null;
    private ?string $xPais = null;
    private ?string $fone = null;
    private string $IE;
    private ?string $IEST = null;
    private ?string $IM = null;
    private ?string $CNAE = null;
    private int $CRT;

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
}
