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

use Pnhs\ParserNF\enums\ArmaTpArma;
use stdClass;

class la extends layout
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det->prod[$numero_item - 1]?->comb;

    if (!$parser)
      return $std;

    $std->cProdANP         = self::tag((string) $parser->cProdANP, 'cProdANP não informado', 'LA02', 1);
    $std->descANP          = self::tag((string) $parser->descANP, 'descANP não informado', 'LA03', 1);
    $std->pGLP             = self::tag((string) $parser->pGLP, 'pGLP não informado', 'LA03a', 0);
    $std->pGNn             = self::tag((string) $parser->pGNn, 'pGNn não informado', 'LA03b', 0);
    $std->pGNi             = self::tag((string) $parser->pGNi, 'pGNi não informado', 'LA03c', 0);
    $std->vPart            = self::tag((string) $parser->vPart, 'vPart não informado', 'LA03d', 0);
    $std->CODIF            = self::tag((string) $parser->CODIF, 'CODIF não informado', 'LA04', 0);
    $std->qTemp            = self::tag((string) $parser->qTemp, 'qTemp não informado', 'LA05', 0);
    $std->UFCons           = self::tag((string) $parser->UFCons, 'UFCons não informado', 'LA06', 1);

    if ($parser->CIDE) self::CIDE($parser->CIDE, $std);
    if ($parser->encerrante) self::encerrante($parser->encerrante, $std);

    return $std;
  }

  private static function CIDE(object $parser, $std): void
  {
    $std->qBCProd          = self::tag((string) $parser->qBCProd, 'qBCProd não informado', 'LA08', 1);
    $std->vAliqProd        = self::tag((string) $parser->vAliqProd, 'vAliqProd não informado', 'LA09', 1);
    $std->vCIDE            = self::tag((string) $parser->vCIDE, 'vCIDE não informado', 'LA10', 1);
  }

  private static function encerrante(object $parser, $std): void
  {
    $std->nBico            = self::tag((string) $parser->nBico, 'nBico não informado', 'LA12', 1);
    $std->nBomba           = self::tag((string) $parser->nBomba, 'nBomba não informado', 'LA13', 0);
    $std->nTanque          = self::tag((string) $parser->nTanque, 'nTanque não informado', 'LA14', 1);
    $std->vEncIni          = self::tag((string) $parser->vEncIni, 'vEncIni não informado', 'LA15', 1);
    $std->vEncFin          = self::tag((string) $parser->vEncFin, 'vEncFin não informado', 'LA16', 1);
  }
}
