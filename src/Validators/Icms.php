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

/**
 * Grupo NXX. ICMS Normal e ST
 */
class Icms
{
    private ?string $orig = null; //11
    private ?string $CST = null; //12
    private ?string $modBC = null; //13
    private ?string $pRedBC = null; //14
    private ?string $vBC = '0'; //15
    private ?string $pICMS = null; //16
    private ?string $vICMSOp = '0'; //16a
    private ?string $pDif = null; //16b
    private ?string $vICMSDif = '0'; //16c
    private ?string $vICMS = '0'; //17
    private ?string $vBCFCP = '0'; //17a
    private ?string $pFCP = null; //17b
    private ?string $vFCP = '0'; //17c
    private ?string $modBCST = null; //18
    private ?string $pMVAST = null; //19
    private ?string $pRedBCST = null; //20
    private ?string $vBCST = '0'; //21
    private ?string $pICMSST = null; //22
    private ?string $vICMSST = '0'; //23
    private ?string $vBCFCPST = '0'; //23a
    private ?string $pFCPST = null; //23b
    private ?string $vFCPST = '0'; //23d
    private ?string $UFST = null; //24
    private ?string $pBCOp = null; //25
    private ?string $vBCSTRet = '0'; //26
    private ?string $pST = null; //26a
    private ?string $vICMSSubstituto = '0'; //26b
    private ?string $vICMSSTRet = '0'; //27
    private ?string $vBCFCPSTRet = '0'; //27a
    private ?string $pFCPSTRet = null; //27b
    private ?string $vFCPSTRet = '0'; //27d
    private ?string $vICMSDeson = '0'; //28a
    private ?string $motDesICMS = null; //28
    private ?string $pCredSN = null; //29
    private ?string $vCredICMSSN = '0'; //30
    private ?string $vBCSTDest = '0'; //31
    private ?string $vICMSSTDest = '0'; //32
    private ?string $pRedBCEfet = null; //34
    private ?string $vBCEfet = '0'; //35
    private ?string $pICMSEfet = null; //36
    private ?string $vICMSEfet = '0'; //37

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
