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

class w01 extends layout
{
  public static function run(object $data): stdClass
  {
    $std = new stdClass;

    $parser = $data->NFe->infNFe->total->ISSQNtot;

    if (!$parser)
      return $std;

    $std->vServ           = self::tag((string) $parser->vServ, 'vServ não informado', 'W18', 0);
    $std->vBC             = self::tag((string) $parser->vBC, 'vBC não informado', 'W19', 0);
    $std->vISS            = self::tag((string) $parser->vISS, 'vISS não informado', 'W20', 0);
    $std->vPIS            = self::tag((string) $parser->vPIS, 'vPIS não informado', 'W21', 0);
    $std->vCOFINS         = self::tag((string) $parser->vCOFINS, 'vCOFINS não informado', 'W22', 0);
    $std->dCompet         = self::tag((string) $parser->dCompet, 'dCompet não informado', 'W22a', 0);
    $std->vDeducao        = self::tag((string) $parser->vDeducao, 'vDeducao não informado', 'W22b', 1);
    $std->vOutro          = self::tag((string) $parser->vOutro, 'vOutro não informado', 'W22c', 0);
    $std->vDescIncond     = self::tag((string) $parser->vDescIncond, 'vDescIncond não informado', 'W22d', 0);
    $std->vDescCond       = self::tag((string) $parser->vDescCond, 'vDescCond não informado', 'W22e', 0);
    $std->vISSRet         = self::tag((string) $parser->vISSRet, 'vISSRet não informado', 'W22f', 0);
    $std->cRegTrib        = self::tag((string) $parser->cRegTrib, 'cRegTrib não informado', 'W22g', 0);

    return $std;
  }
}
