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

class zd extends layout
{
  public static function run(object $data): stdClass
  {
    $std = new stdClass;

    $parser = $data->NFe->infNFe->infRespTec;

    if (!$parser)
      return $std;

    $std->CNPJ            = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'ZD02', 1);
    $std->xContato        = self::tag((string) $parser->xContato, 'xContato não informado', 'ZD03', 1);
    $std->email           = self::tag((string) $parser->email, 'email não informado', 'ZD04', 1);
    $std->fone            = self::tag((string) $parser->fone, 'fone não informado', 'ZD05', 1);
    if ($parser->idCSRT || $parser->hashCSRT) {
      $std->idCSRT        = self::tag((string) $parser->idCSRT, 'idCSRT não informado', 'ZD08', 1);
      $std->hashCSRT      = self::tag((string) $parser->hashCSRT, 'hashCSRT não informado', 'ZD09', 1);
    }

    return $std;
  }
}
