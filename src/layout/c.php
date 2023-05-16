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
  CRT
};

class c extends layout
{
  public static function run($data): stdClass
  {
    $parser = $data->NFe->infNFe->emit;
    $std = new stdClass;

    $std->CNPJ    = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'C02', 0);
    $std->CPF     = self::tag((string) $parser->CPF, 'CPF não informado', 'C02a', 0);
    $std->xNome   = self::tag((string) $parser->xNome, 'xNome não informado', 'C03', 1);
    $std->xFant   = self::tag((string) $parser->xFant, 'xFant não informado', 'C04', 0);
    if ($parser->enderEmit) self::enderEmit($parser->enderEmit, $std);
    $std->IE      = self::tag((string) $parser->IE, 'IE não informado', 'C17', 1);
    $std->IEST    = self::tag((string) $parser->IEST, 'IEST não informado', 'C18', 0);
    self::imOrCnae($parser, $std);
    $std->CRT     = self::tag((string) $parser->CRT, 'CRT não informado', 'C21', 1);
    return $std;
  }

  private static function enderEmit(object $parser, stdClass $std): void
  {
    $std->xLgr    = self::tag((string) $parser->xLgr, 'xFant não informado', 'C06', 1);
    $std->nro     = self::tag((string) $parser->nro, 'nro não informado', 'C07', 1);
    $std->xCpl    = self::tag((string) $parser->xCpl, 'xCpl não informado', 'C08', 0);
    $std->xBairro = self::tag((string) $parser->xBairro, 'xBairro não informado', 'C09', 1);
    $std->cMun    = self::tag((string) $parser->cMun, 'cMun não informado', 'C10', 1);
    $std->xMun    = self::tag((string) $parser->xMun, 'xMun não informado', 'C11', 1);
    $std->UF      = self::tag((string) $parser->UF, 'UF não informado', 'C12', 1);
    $std->CEP     = self::tag((string) $parser->CEP, 'CEP não informado', 'C13', 1);
    $std->cPais   = self::tag((string) $parser->cPais, 'cPais não informado', 'C14', 0);
    $std->xPais   = self::tag((string) $parser->xPais, 'xPais não informado', 'C15', 0);
    $std->fone    = self::tag((string) $parser->fone, 'fone não informado', 'C16', 0);
  }

  private static function imOrCnae(object $parser, stdClass $std): void
  {
    if ($parser->IM || $parser->CNAE) {
      $std->IM    = self::tag((string) $parser->IM, 'IM não informado', 'C19', 1);
      $std->CNAE  = self::tag((string) $parser->CNAE, 'CNAE não informado', 'C20', 1);
    }
  }
}
