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

class Prod
{
    private Decimal $vProdDec;

    private string $cProd = "";
    private string $cEAN = "SEM GTIN";
    private string $xProd = "";
    private string $NCM = "";
    private ?string $CEST = null;
    private ?NVE $NVE = null;
    private ?string $indEscala = null;
    private ?int $CNPJFab = null;
    private ?string $cBenef = null;
    private ?int $EXTIPI = null;
    private string $CFOP = "";
    private string $uCom = "";
    private string $qCom = "0";
    private string $vUnCom = "0";
    private string $vProd = "0";
    private string $cEANTrib = "SEM GTIN";
    private ?string $uTrib = null;
    private ?string $qTrib = null;
    private ?string $vUnTrib = null;
    private string $vFrete = "0";
    private string $vSeg = "0";
    private string $vDesc = "0";
    private string $vOutro = "0";
    private int $indTot = 1;

    public function __construct()
    {
        $this->vProdDec = new Decimal("0", 2, ".");
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
            @$this->$name = $value;
        }
    }

    private function getNVE(): array
    {
        foreach ((array) $this->NVE as $nve) {
            return $nve;
        }
        return [];
    }

    private function getQCom(): string
    {
        return (new Decimal($this->qCom, 4, "."))->result();
    }

    private function getVUnCom(): string
    {
        return (new Decimal($this->vUnCom, 10, "."))->result();
    }

    private function getVProd(): string
    {
        if ($this->vProd != "0") {
            return (new Decimal($this->vProd, 2))->result();
        }

        return (new Decimal("0", 2))->sum($this->vUnCom)->mul($this->qCom)->result();
    }

    private function getUTrib(): string
    {
        return ($this->uTrib ?? $this->uCom);
    }

    private function getQTrib(): string
    {
        return (new Decimal(($this->qTrib ?? $this->qCom), 4, "."))->result();
    }

    private function getVUnTrib(): string
    {
        return (new Decimal(($this->vUnTrib ?? $this->vUnCom), 10, "."))->result();
    }

    private function getVFrete(): string
    {
        return (new Decimal($this->vFrete, 2, "."))->result();
    }

    private function getVSeg(): string
    {
        return (new Decimal($this->vSeg, 2, "."))->result();
    }

    private function getVDesc(): string
    {
        return (new Decimal($this->vDesc, 2, "."))->result();
    }

    private function getVOutro(): string
    {
        return (new Decimal($this->vOutro, 2, "."))->result();
    }
}
