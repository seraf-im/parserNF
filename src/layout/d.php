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

class d extends layout
{
  public static function run($data): stdClass
  {
    $parser = $data->NFe->infNFe->avulsa;
    $std = new stdClass;

    if (!$data->NFe->infNFe->avulsa)
      return $std;

    $std->CNPJ    = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'D02', 1);
    $std->xOrgao  = self::tag((string) $parser->xOrgao, 'xOrgao não informado', 'D03', 1);
    $std->matr    = self::tag((string) $parser->matr, 'matr não informado', 'D04', 1);
    $std->xAgente = self::tag((string) $parser->xAgente, 'xAgente não informado', 'D05', 1);
    $std->fone    = self::tag((string) $parser->fone, 'fone não informado', 'D06', 0);
    $std->UF      = self::tag((string) $parser->UF, 'UF não informado', 'D07', 1);
    $std->nDAR    = self::tag((string) $parser->nDAR, 'nDAR não informado', 'D08', 0);
    $std->dEmi    = self::tag((string) $parser->dEmi, 'dEmi não informado', 'D09', 0);
    $std->vDAR    = self::tag((string) $parser->vDAR, 'vDAR não informado', 'D10', 0);
    $std->repEmi  = self::tag((string) $parser->repEmi, 'repEmi não informado', 'D11', 1);
    $std->dPag    = self::tag((string) $parser->dPag, 'dPag não informado', 'D12', 0);

    return $std;
  }
}
