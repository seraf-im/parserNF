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

use stdClass;
use Pnhs\ParserNF\enums\{
  TpViaTransp,
  TpIntermedio
};

class i01 extends layout
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det->prod[$numero_item - 1]?->DI;
    $return = [];
    $i = 0;

    if (!$parser)
      return $std;

    self::tag($parser, 'No máximo 100 declarações', 'I18', 0, 100);

    $std->nDI               = self::tag((string) $parser->nDI, 'nDI não informado', 'I19', 1);
    $std->dDI               = self::tag((string) $parser->dDI, 'dDI não informado', 'I20', 1);
    $std->xLocDesemb        = self::tag((string) $parser->xLocDesemb, 'xLocDesemb não informado', 'I21', 1);
    $std->UFDesemb          = self::tag((string) $parser->UFDesemb, 'UFDesemb não informado', 'I22', 1);
    $std->dDesemb           = self::tag((string) $parser->dDesemb, 'dDesemb não informado', 'I23', 1);
    $std->tpViaTransp       = TpViaTransp::from((int)self::tag((string) $parser->tpViaTransp, 'tpViaTransp não informado', 'I23a', 1));
    $std->vAFRMM            = self::tag((string) $parser->vAFRMM, 'vAFRMM não informado', 'I23b', 0);
    $std->tpIntermedio      = TpIntermedio::from((int) self::tag((string) $parser->tpIntermedio, 'tpIntermedio não informado', 'I23c', 1));
    $std->CNPJ              = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'I23d', 0);
    $std->UFTerceiro        = self::tag((string) $parser->UFTerceiro, 'UFTerceiro não informado', 'I23e', 0);
    $std->cProdcExportador  = self::tag((string) $parser->cExportador, 'cExportador não informado', 'I24', 1);

    $i = 0;

    self::tag($parser->adi, 'No máximo 100 adições', 'I25', 0, 100);

    if ($parser->adi) {
      foreach ($parser->adi as $item) {
        $return[$i] = self::adi($item, $std);
        $i++;
      }

      $std->adi = $return;
    }

    return $std;
  }

  private static function adi(object $parser): object
  {
    $std = new stdClass;

    $std->nAdicao           = self::tag((string) $parser->nAdicao, 'nAdicao não informado', 'I26', 1);
    $std->nSeqAdic          = self::tag((string) $parser->nSeqAdic, 'nSeqAdic não informado', 'I27', 1);
    $std->cFabricante       = self::tag((string) $parser->cFabricante, 'cFabricante não informado', 'I28', 1);
    $std->vDescDI           = self::tag((string) $parser->vDescDI, 'vDescDI não informado', 'I29', 0);
    $std->nDraw             = self::tag((string) $parser->nDraw, 'nDraw não informado', 'I29a', 0);

    return $std;
  }
}
