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

class s extends layout
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det[$numero_item - 1]->imposto->COFINS;

    if (!$parser)
      return $std;

    $group = key(get_object_vars($parser));

    self::$group($parser, $std);

    return $std;
  }

  private static function COFINSAliq($parser, $std): void
  {
    $parser = $parser->COFINSAliq;

    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'S06', 1);
    $std->vBC             = self::tag((string) $parser->vBC, 'vBC não informado', 'S07', 1);
    $std->pCOFINS         = self::tag((string) $parser->pCOFINS, 'pCOFINS não informado', 'S08', 1);
    $std->vCOFINS         = self::tag((string) $parser->vCOFINS, 'vCOFINS não informado', 'S11', 1);
  }

  private static function COFINSQtde($parser, $std): void
  {
    $parser = $parser->COFINSQtde;

    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'S06', 1);
    $std->qBCProd         = self::tag((string) $parser->qBCProd, 'qBCProd não informado', 'S09', 1);
    $std->vAliqProd       = self::tag((string) $parser->vAliqProd, 'vAliqProd não informado', 'S10', 1);
    $std->vCOFINS         = self::tag((string) $parser->vCOFINS, 'vCOFINS não informado', 'S11', 1);
  }

  private static function COFINSNT($parser, $std): void
  {
    $parser = $parser->COFINSNT;

    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'S06', 1);
  }

  private static function COFINSOutr($parser, $std): void
  {
    $parser = $parser->COFINSOutr;

    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'S06', 1);
    if ($parser->vBC || $parser->pCOFINS) {
      $std->vBC           = self::tag((string) $parser->vBC, 'vBC não informado', 'S07', 1);
      $std->pCOFINS       = self::tag((string) $parser->pCOFINS, 'pCOFINS não informado', 'S08', 1);
    }
    if ($parser->qBCProd || $parser->vAliqProd) {
      $std->qBCProd       = self::tag((string) $parser->qBCProd, 'qBCProd não informado', 'S09', 1);
      $std->vAliqProd     = self::tag((string) $parser->vAliqProd, 'vAliqProd não informado', 'S10', 1);
    }
    $std->vCOFINS       = self::tag((string) $parser->vCOFINS, 'vCOFINS não informado', 'S11', 1);
  }
}
