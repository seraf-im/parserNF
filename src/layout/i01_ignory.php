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

namespace Pnhs\ParserXml\layout;

use stdClass;
use Pnhs\ParserXml\enums\{
  TpViaTransp
};

class i01
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det->prod[$numero_item - 1]?->DI;
    $return = [];
    $i = 0;

    if (!$parser)
      return new stdClass;

    $std->numero_documento_importacao           = (string) $parser->nDI;
    $std->data_documento_importacao             = strtotime((string) $parser->dDI);
    $std->local_desembaraco                     = (string) $parser->xLocDesemb;
    $std->uf_desembaraco                        = (string) $parser->UFDesemb;
    $std->data_desembaraco                      = strtotime((string) $parser->dDesemb);
    $std->via_transporte                        = TpViaTransp::from((int) $parser->tpViaTransp);
    $std->valor_afrmm                           = (string) $parser->vAFRMM;
    $std->tipo_importacao                       = TpIntermedio::from((int) $parser->tpIntermedio);
    $std->cnpj_intermedio                       = (string) $parser->CNPJ;
    $std->uf_intermedio                         = (string) $parser->UFTerceiro;
    $std->codigo_exportador                     = (string) $parser->cExportador;

    $i = 0;
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

    $std->numero_adicao                         = (string) $parser->nAdicao;
    $std->numero_sequencial_item_adicao         = (string) $parser->nSeqAdic;
    $std->codigo_fabricante_estrangeiro         = (string) $parser->cFabricante;
    $std->valor_desconto_adicao                 = (string) $parser->vDescDI;
    $std->numero_drawback_importacao            = (string) $parser->nDraw;

    return $std;
  }
}
