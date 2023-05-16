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

class g extends layout
{
  public static function run(object $data): stdClass
  {
    $parser = $data->NFe->infNFe->entrega;
    $std = new stdClass;

    if (!$parser)
      return $std;

    $std->CNPJ    = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'G02', 0);
    $std->CPF     = self::tag((string) $parser->CPF, 'CPF não informado', 'G02a', 0);
    $std->xNome   = self::tag((string) $parser->xNome, 'xNome não informado', 'G02b', 0);
    $std->xLgr    = self::tag((string) $parser->xLgr, 'xLgr não informado', 'G03', 1);
    $std->nro     = self::tag((string) $parser->nro, 'nro não informado', 'G04', 1);
    $std->xCpl    = self::tag((string) $parser->xCpl, 'xCpl não informado', 'G05', 0);
    $std->xBairro = self::tag((string) $parser->xBairro, 'xBairro não informado', 'G06', 1);
    $std->cMun    = self::tag((string) $parser->cMun, 'cMun não informado', 'G07', 1);
    $std->xMun    = self::tag((string) $parser->xMun, 'xMun não informado', 'G08', 1);
    $std->UF      = self::tag((string) $parser->UF, 'UF não informado', 'G09', 1);
    $std->CEP     = self::tag((string) $parser->CEP, 'CEP não informado', 'G10', 0);
    $std->cPais   = self::tag((string) $parser->cPais, 'cPais não informado', 'G11', 0);
    $std->xPais   = self::tag((string) $parser->xPais, 'xPais não informado', 'G12', 0);
    $std->fone    = self::tag((string) $parser->fone, 'Gone não informado', 'G13', 0);
    $std->email   = self::tag((string) $parser->email, 'email não informado', 'G14', 0);
    $std->IE      = self::tag((string) $parser->IE, 'CNPJ não informado', 'G15', 0);

    return $std;
  }
}
