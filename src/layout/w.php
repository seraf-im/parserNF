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

class w extends layout
{
  public static function run(object $data): stdClass
  {
    $std = new stdClass;

    $parser = $data->NFe->infNFe->total->ICMSTot;

    if (!$parser)
      return $std;

    $std->vBC             = self::tag((string) $parser->vBC, 'vBC não informado', 'W03', 1);
    $std->vICMS           = self::tag((string) $parser->vICMS, 'vICMS não informado', 'W04', 1);
    $std->vICMSDeson      = self::tag((string) $parser->vICMSDeson, 'vICMSDeson não informado', 'W04a', 1);
    $std->vFCPUFDest      = self::tag((string) $parser->vFCPUFDest, 'vFCPUFDest não informado', 'w04c', 0);
    $std->vICMSUFDest     = self::tag((string) $parser->vICMSUFDest, 'vICMSUFDest não informado', 'W04e', 0);
    $std->vICMSUFRemet    = self::tag((string) $parser->vICMSUFRemet, 'vICMSUFRemet não informado', 'W04e', 0);
    $std->vFCP            = self::tag((string) $parser->vFCP, 'vFCP não informado', 'W04h', 1);
    $std->vBCST           = self::tag((string) $parser->vBCST, 'vBCST não informado', 'W05', 1);
    $std->vST             = self::tag((string) $parser->vST, 'vST não informado', 'W06', 1);
    $std->vFCPST          = self::tag((string) $parser->vFCPST, 'vFCPST não informado', 'W06a', 1);
    $std->vFCPSTRet       = self::tag((string) $parser->vFCPSTRet, 'vFCPSTRet não informado', 'W06b', 1);
    $std->vProd           = self::tag((string) $parser->vProd, 'vProd não informado', 'W07', 1);
    $std->vFrete          = self::tag((string) $parser->vFrete, 'vFrete não informado', 'W08', 1);
    $std->vSeg            = self::tag((string) $parser->vSeg, 'vSeg não informado', 'W09', 1);
    $std->vDesc           = self::tag((string) $parser->vDesc, 'vDesc não informado', 'W10', 1);
    $std->vII             = self::tag((string) $parser->vII, 'vII não informado', 'W11', 1);
    $std->vIPI            = self::tag((string) $parser->vIPI, 'vIPI não informado', 'W12', 1);
    $std->vIPIDevol       = self::tag((string) $parser->vIPIDevol, 'vIPIDevol não informado', 'W12a', 1);
    $std->vPIS            = self::tag((string) $parser->vPIS, 'vPIS não informado', 'W13', 1);
    $std->vCOFINS         = self::tag((string) $parser->vCOFINS, 'vCOFINS não informado', 'W14', 1);
    $std->vOutro          = self::tag((string) $parser->vOutro, 'vOutro não informado', 'W15', 1);
    $std->vNF             = self::tag((string) $parser->vNF, 'vNF não informado', 'W16', 1);
    $std->vTotTrib        = self::tag((string) $parser->vTotTrib, 'vTotTrib não informado', 'W16a', 0);

    return $std;
  }
}
