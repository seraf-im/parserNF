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
##                                          INICIO CÓDIGO DE FONTE!                                          ##
###############################################################################################################

namespace Pnhs\ParserNF\layout;

use Pnhs\ParserNF\enums\VeicProdCCorDenatran;
use Pnhs\ParserNF\enums\VeicProdCondVeic;
use Pnhs\ParserNF\enums\VeicProdEspVeic;
use Pnhs\ParserNF\enums\VeicProdTpComb;
use Pnhs\ParserNF\enums\VeicProdTpOp;
use Pnhs\ParserNF\enums\VeicProdTpRest;
use Pnhs\ParserNF\enums\VeicProdTpVeic;
use Pnhs\ParserNF\enums\VeicProdVIN;
use stdClass;

class j extends layout
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det->prod[$numero_item - 1]?->veicProd;

    if (!$parser)
      return $std;

    $std->tpOp             = VeicProdTpOp::from((int)self::tag((string) $parser->tpOp, 'tpOp não informado', 'J02', 1));
    $std->chassi           = self::tag((string) $parser->chassi, 'chassi não informado', 'J03', 1);
    $std->cCor             = self::tag((string) $parser->cCor, 'cCor não informado', 'J04', 1);
    $std->xCor             = self::tag((string) $parser->xCor, 'xCor não informado', 'J05', 1);
    $std->pot              = self::tag((string) $parser->pot, 'pot não informado', 'J06', 1);
    $std->cilin            = self::tag((string) $parser->cilin, 'cilin não informado', 'J07', 1);
    $std->pesoL            = self::tag((string) $parser->pesoL, 'pesoL não informado', 'J08', 1);
    $std->pesoB            = self::tag((string) $parser->pesoB, 'pesoB não informado', 'J09', 1);
    $std->nSerie           = self::tag((string) $parser->nSerie, 'nSerie não informado', 'J10', 1);
    $std->tpComb           = VeicProdTpComb::from(self::tag((string) $parser->tpComb, 'tpComb não informado', 'J11', 1));
    $std->nMotor           = self::tag((string) $parser->nMotor, 'nMotor não informado', 'J12', 1);
    $std->CMT              = self::tag((string) $parser->CMT, 'CMT não informado', 'J13', 1);
    $std->dist             = self::tag((string) $parser->dist, 'dist não informado', 'J14', 1);
    $std->anoMod           = self::tag((string) $parser->anoMod, 'anoMod não informado', 'J16', 1);
    $std->anoFab           = self::tag((string) $parser->anoFab, 'anoFab não informado', 'J17', 1);
    $std->tpPint           = self::tag((string) $parser->tpPint, 'tpPint não informado', 'J18', 1);
    $std->tpVeic           = VeicProdTpVeic::from(self::tag((string) $parser->tpVeic, 'tpVeic não informado', 'J19', 1));
    $std->espVeic          = VeicProdEspVeic::from((int)self::tag((string) $parser->espVeic, 'espVeic não informado', 'J20', 1));
    $std->VIN              = VeicProdVIN::from(self::tag((string) $parser->VIN, 'VIN não informado', 'J21', 1));
    $std->condVeic         = VeicProdCondVeic::from((int) self::tag((string) $parser->condVeic, 'condVeic não informado', 'J22', 1));
    $std->cMod             = self::tag((string) $parser->cMod, 'cMod não informado', 'J23', 1);
    $std->cCorDENATRAN     = VeicProdCCorDenatran::from(self::tag((string) $parser->cCorDENATRAN, 'cCorDENATRAN não informado', 'J24', 1));
    $std->lota             = self::tag((string) $parser->lota, 'lota não informado', 'J25', 1);
    $std->tpRest           = VeicProdTpRest::from((int)self::tag((string) $parser->tpRest, 'tpRest não informado', 'J26', 1));

    return $std;
  }
}
