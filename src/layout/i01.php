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

    $i = 0;
    foreach ($parser as $item) {
      $r['nDI']               = self::tag((string) $item->nDI, 'nDI não informado', 'I19', 1);
      $r['dDI']               = self::tag((string) $item->dDI, 'dDI não informado', 'I20', 1);
      $r['xLocDesemb']        = self::tag((string) $item->xLocDesemb, 'xLocDesemb não informado', 'I21', 1);
      $r['UFDesemb']          = self::tag((string) $item->UFDesemb, 'UFDesemb não informado', 'I22', 1);
      $r['dDesemb']           = self::tag((string) $item->dDesemb, 'dDesemb não informado', 'I23', 1);
      $r['tpViaTransp']       = TpViaTransp::from((int)self::tag((string) $item->tpViaTransp, 'tpViaTransp não informado', 'I23a', 1));
      $r['vAFRMM']            = self::tag((string) $item->vAFRMM, 'vAFRMM não informado', 'I23b', 0);
      $r['tpIntermedio']      = TpIntermedio::from((int) self::tag((string) $item->tpIntermedio, 'tpIntermedio não informado', 'I23c', 1));
      $r['CNPJ']              = self::tag((string) $item->CNPJ, 'CNPJ não informado', 'I23d', 0);
      $r['UFTerceiro']        = self::tag((string) $item->UFTerceiro, 'UFTerceiro não informado', 'I23e', 0);
      $r['cProdcExportador']  = self::tag((string) $item->cExportador, 'cExportador não informado', 'I24', 1);

      $ii = 0;

      self::tag($item->adi, 'No máximo 100 adições', 'I25', 0, 100);

      if ($item->adi) {
        unset($return);
        foreach ($item->adi as $item2) {
          $return[$ii] = self::adi($item2, $std);
          $ii++;
        }

        $r['adi'] = $return;
      }

      $std->$i = $r;
      $i++;
    }

    return $std;
  }

  private static function adi(object $parser): object
  {
    var_dump($parser);
    $std = new stdClass;

    $std->nAdicao           = self::tag((string) $parser->nAdicao, 'nAdicao não informado', 'I26', 1);
    $std->nSeqAdic          = self::tag((string) $parser->nSeqAdic, 'nSeqAdic não informado', 'I27', 1);
    $std->cFabricante       = self::tag((string) $parser->cFabricante, 'cFabricante não informado', 'I28', 1);
    $std->vDescDI           = self::tag((string) $parser->vDescDI, 'vDescDI não informado', 'I29', 0);
    $std->nDraw             = self::tag((string) $parser->nDraw, 'nDraw não informado', 'I29a', 0);

    return $std;
  }
}
