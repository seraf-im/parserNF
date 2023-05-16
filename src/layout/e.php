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

class e extends layout
{
  public static function run(object $data): stdClass
  {
    $parser = $data->NFe->infNFe->dest;
    $std = new stdClass;

    if (!$parser)
      return $std;

    $std->CNPJ    = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'E02', 0);
    $std->CPF    = self::tag((string) $parser->CPF, 'CPF não informado', 'E03', 0);
    $std->idEstrangeiro    = self::tag((string) $parser->idEstrangeiro, 'idEstrangeiro não informado', 'E03a', 0);
    $std->xNome    = self::tag((string) $parser->xNome, 'xNome não informado', 'E04', 1);
    self::enderDest($parser->enderDest, $std);
    $std->indIEDest    = self::tag((string) $parser->indIEDest, 'indIEDest não informado', 'E16a', 1);
    $std->IE    = self::tag((string) $parser->IE, 'IE não informado', 'E17', 0);
    $std->ISUF    = self::tag((string) $parser->ISUF, 'ISUF não informado', 'E18', 0);
    $std->IM    = self::tag((string) $parser->IM, 'IM não informado', 'E18a', 0);
    $std->email    = self::tag((string) $parser->email, 'email não informado', 'E19', 0);

    return $std;
  }

  private static function enderDest(object $parser, stdClass $std): void
  {
    $std->xLgr = self::tag((string) $parser->xLgr, 'xLgr não informado', 'E06', 1);
    $std->nro = self::tag((string) $parser->nro, 'nro não informado', 'E07', 1);
    $std->xCpl = self::tag((string) $parser->xCpl, 'xCpl não informado', 'E08', 0);
    $std->xBairro = self::tag((string) $parser->xBairro, 'xBairro não informado', 'E09', 1);
    $std->cMun = self::tag((string) $parser->cMun, 'cMun não informado', 'E10', 1);
    $std->xMun = self::tag((string) $parser->xMun, 'xMun não informado', 'E11', 1);
    $std->UF = self::tag((string) $parser->UF, 'UF não informado', 'E12', 1);
    $std->CEP = self::tag((string) $parser->CEP, 'CEP não informado', 'E13', 0);
    $std->cPais = self::tag((string) $parser->cPais, 'cPais não informado', 'E14', 0);
    $std->xPais = self::tag((string) $parser->xPais, 'xPais não informado', 'E15', 0);
    $std->fone = self::tag((string) $parser->fone, 'fone não informado', 'E16', 0);
  }
}
