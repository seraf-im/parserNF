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

class s
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det->imposto[$numero_item - 1]->COFINS;

    $group = key(get_object_vars($parser));

    self::$group($parser, $std);

    return $std;
  }

  private static function COFINSAliq($parser, $std): void
  {
    $parser = $parser->COFINSAliq;

    $std->cofins_situacao_tributaria            = (string) $parser->CST;
    $std->cofins_base_calculo                   = (string) $parser->vBC;
    $std->cofins_aliquota_porcentual            = (string) $parser->pCOFINS;
    $std->cofins_valor                          = (string) $parser->vCOFINS;
  }

  private static function COFINSQtde($parser, $std): void
  {
    $parser = $parser->COFINSQtde;

    $std->cofins_situacao_tributaria            = (string) $parser->CST;
    $std->cofins_quantidade_vendida             = (string) $parser->qBCProd;
    $std->cofins_aliquota_valor                 = (string) $parser->vAliqProd;
    $std->cofins_valor                          = (string) $parser->vCOFINS;
  }

  private static function COFINSNT($parser, $std): void
  {
    $parser = $parser->COFINSNT;

    $std->cofins_situacao_tributaria            = (string) $parser->CST;
  }

  private static function COFINSOutr($parser, $std): void
  {
    $parser = $parser->COFINSOutr;

    $std->cofins_base_calculo                   = (string) $parser->vBC;
    $std->cofins_aliquota_porcentual            = (string) $parser->pCOFINS;
    $std->cofins_quantidade_vendida             = (string) $parser->qBCProd;
    $std->cofins_aliquota_valor                 = (string) $parser->vAliqProd;
    $std->cofins_valor                          = (string) $parser->vCOFINS;
  }
}
