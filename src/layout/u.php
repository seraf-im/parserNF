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

class u extends layout
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det[$numero_item - 1]->imposto->ISSQN;

    if (!$parser)
      return $std;

    $std->vBC             = self::tag((string) $parser->vBC, 'vBC não informado', 'U02', 1);
    $std->vAliq           = self::tag((string) $parser->vAliq, 'vAliq não informado', 'U03', 1);
    $std->vISSQN          = self::tag((string) $parser->vISSQN, 'vISSQN não informado', 'U04', 1);
    $std->cMunFG          = self::tag((string) $parser->cMunFG, 'cMunFG não informado', 'U05', 1);
    $std->cListServ       = self::tag((string) $parser->cListServ, 'cListServ não informado', 'U06', 1);
    $std->vDeducao        = self::tag((string) $parser->vDeducao, 'vDeducao não informado', 'U07', 0);
    $std->vOutro          = self::tag((string) $parser->vOutro, 'vOutro não informado', 'U08', 0);
    $std->vDescIncond     = self::tag((string) $parser->vDescIncond, 'vDescIncond não informado', 'U09', 0);
    $std->vDescCond       = self::tag((string) $parser->vDescCond, 'vDescCond não informado', 'U10', 0);
    $std->vISSRet         = self::tag((string) $parser->vISSRet, 'vISSRet não informado', 'U11', 0);
    $std->indISS          = self::tag((string) $parser->indISS, 'indISS não informado', 'U12', 1);
    $std->cServico        = self::tag((string) $parser->cServico, 'cServico não informado', 'U13', 0);
    $std->cMun            = self::tag((string) $parser->cMun, 'cMun não informado', 'U14', 0);
    $std->cPais           = self::tag((string) $parser->cPais, 'cPais não informado', 'U15', 0);
    $std->nProcesso       = self::tag((string) $parser->nProcesso, 'nProcesso não informado', 'U16', 0);
    $std->indIncentivo    = self::tag((string) $parser->indIncentivo, 'indIncentivo não informado', 'U17', 1);

    return $std;
  }
}
