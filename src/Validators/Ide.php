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

use Pnhs\ParserNF\enums\FinNFe;
use Pnhs\ParserNF\enums\IdDest;
use Pnhs\ParserNF\enums\IndFinal;
use Pnhs\ParserNF\enums\IndIntermed;
use Pnhs\ParserNF\enums\IndPres;
use Pnhs\ParserNF\enums\Mod;
use Pnhs\ParserNF\enums\TpAmb;
use Pnhs\ParserNF\enums\TpEmis;
use Pnhs\ParserNF\enums\TpImp;
use Pnhs\ParserNF\enums\TpNF;

/**
 * Grupo B. Identificação da Nota Fiscal eletrônica
 */
class Ide
{
    private ?string $cUF = null;
    private ?string $cNF = null;
    private string $natOp;
    private Mod $mod;
    private ?string $serie = null;
    private ?string $nNF = null;
    private string $dhEmi;
    private ?string $dhSaiEnt = null;
    private TpNF $tpNF;
    private IdDest $idDest;
    private ?string $cMunFG = null;
    private ?TpImp $tpImp = null;
    private TpEmis $tpEmis;
    private ?string $cDV = null;
    private TpAmb $tpAmb;
    private FinNFe $finNFe;
    private IndFinal $indFinal;
    private IndPres $indPres;
    private IndIntermed $indIntermed;
    private ?string $dhCont = null;
    private ?string $xJust = null;

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
