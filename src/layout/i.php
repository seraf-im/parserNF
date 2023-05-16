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

class i extends layout
{
  public static function run(object $data, int $nItem, $std = new stdClass): stdClass
  {
    $parser = $data->xpath("//NFe//det[@nItem = {$nItem}]//prod")[0];

    $std->cProd     = self::tag((string) $parser->cProd, 'cProd não informado', 'I02', 1);
    $std->cEAN      = self::tag((string) $parser->cEAN, 'cEAN não informado', 'I03', 1);
    $std->xProd     = self::tag((string) $parser->xProd, 'xProd não informado', 'I04', 1);
    $std->NCM       = self::tag((string) $parser->NCM, 'NCM não informado', 'I05', 1);
    self::nve($parser->NVE, $std);
    $std->CEST      = self::tag((string) $parser->CEST, 'CEST não informado', 'I05c', 0);
    $std->indEscada = self::tag((string) $parser->indEscada, 'indEscada não informado', 'I05d', 0);
    $std->CNPJFab   = self::tag((string) $parser->CNPJFab, 'CNPJFab não informado', 'I05e', 0);
    $std->cBenef    = self::tag((string) $parser->cBenef, 'cBenef não informado', 'I05f', 0);
    $std->EXTIPI    = self::tag((string) $parser->EXTIPI, 'EXTIPI não informado', 'I06', 0);
    $std->CFOP      = self::tag((string) $parser->CFOP, 'CFOP não informado', 'I08', 1);
    $std->uCom      = self::tag((string) $parser->uCom, 'uCom não informado', 'I09', 1);
    $std->qCom      = self::tag((string) $parser->qCom, 'qCom não informado', 'I10', 1);
    $std->vUnCom    = self::tag((string) $parser->vUnCom, 'vUnCom não informado', 'I10a', 1);
    $std->vProd     = self::tag((string) $parser->vProd, 'vProd não informado', 'I11', 1);
    $std->cEANTrib  = self::tag((string) $parser->cEANTrib, 'cEANTrib não informado', 'I12', 1);
    $std->uTrib     = self::tag((string) $parser->uTrib, 'uTrib não informado', 'I13', 1);
    $std->qTrib     = self::tag((string) $parser->qTrib, 'qTrib não informado', 'I14', 1);
    $std->vUnTrib   = self::tag((string) $parser->vUnTrib, 'vUnTrib não informado', 'I14a', 1);
    $std->vFrete    = self::tag((string) $parser->vFrete, 'vFrete não informado', 'I15', 0);
    $std->vSeg      = self::tag((string) $parser->vSeg, 'vSeg não informado', 'I16', 0);
    $std->vDesc     = self::tag((string) $parser->vDesc, 'vDesc não informado', 'I17', 0);
    $std->vOutro    = self::tag((string) $parser->vOutro, 'vOutro não informado', 'I17a', 0);
    $std->indTot    = self::tag((string) $parser->indTot, 'indTot não informado', 'I17b', 1);

    return $std;
  }

  private static function nve(object $parser, stdClass $std): void
  {
    $i = 0;
    foreach ($parser as $item) {
      $std->NVE[$i] = self::tag((string) $item, "NVE[$i] não informado", 'I05a', 1);
      $i++;
    }
  }
}
