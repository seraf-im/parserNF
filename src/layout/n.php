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

class n extends layout
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det[$numero_item - 1]->imposto->ICMS;

    $group = key(get_object_vars($parser));

    self::$group($parser, $std);

    return $std;
  }

  private static function ICMS00($parser, $std): void
  {
    $std->orig            = self::tag((string) $parser->ICMS00->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->ICMS00->CST, 'CST não informado', 'N12', 1);
    $std->modBC           = self::tag((string) $parser->ICMS00->modBC, 'modBC não informado', 'N13', 1);
    $std->vBC             = self::tag((string) $parser->ICMS00->vBC, 'vBC não informado', 'N15', 1);
    $std->pICMS           = self::tag((string) $parser->ICMS00->pICMS, 'pICMS não informado', 'N16', 1);
    $std->vICMS           = self::tag((string) $parser->ICMS00->vICMS, 'vICMS não informado', 'N17', 1);
    if ($parser->ICMS00->pFCP || $parser->ICMS00->vFCP) {
      $std->pFCP          = self::tag((string) $parser->ICMS00->pFCP, 'pFCP não informado', 'N17b', 1);
      $std->vFCP          = self::tag((string) $parser->ICMS00->vFCP, 'vFCP não informado', 'N17c', 1);
    }
  }

  private static function ICMS10($parser, $std): void
  {
    $std->orig            = self::tag((string) $parser->ICMS10->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->ICMS10->CST, 'CST não informado', 'N12', 1);
    $std->modBC           = self::tag((string) $parser->ICMS10->modBC, 'modBC não informado', 'N13', 1);
    $std->vBC             = self::tag((string) $parser->ICMS10->vBC, 'vBC não informado', 'N15', 1);
    $std->pICMS           = self::tag((string) $parser->ICMS10->pICMS, 'pICMS não informado', 'N16', 1);
    $std->vICMS           = self::tag((string) $parser->ICMS10->vICMS, 'vICMS não informado', 'N17', 1);
    if ($parser->ICMS10->pFCP || $parser->ICMS10->vFCP || $parser->ICMS10->vBCFCP) {
      $std->vBCFCP        = self::tag((string) $parser->ICMS10->vBCFCP, 'vBCFCP não informado', 'N17a', 1);
      $std->pFCP          = self::tag((string) $parser->ICMS10->pFCP, 'pFCP não informado', 'N17b', 1);
      $std->vFCP          = self::tag((string) $parser->ICMS10->vFCP, 'vFCP não informado', 'N17c', 1);
    }
    $std->modBCST         = self::tag((string) $parser->ICMS10->modBCST, 'modBCST não informado', 'N18', 1);
    $std->pMVAST          = self::tag((string) $parser->ICMS10->pMVAST, 'pMVAST não informado', 'N19', 0);
    $std->pRedBCST        = self::tag((string) $parser->ICMS10->pRedBCST, 'pRedBCST não informado', 'N20', 0);
    $std->vBCST           = self::tag((string) $parser->ICMS10->vBCST, 'vBCST não informado', 'N21', 1);
    $std->pICMSST         = self::tag((string) $parser->ICMS10->pICMSST, 'pICMSST não informado', 'N22', 1);
    $std->vICMSST         = self::tag((string) $parser->ICMS10->vICMSST, 'vICMSST não informado', 'N23', 1);
    if ($parser->ICMS10->vBCFCPST || $parser->ICMS10->pFCPST || $parser->ICMS10->vFCPST) {
      $std->vBCFCPST      = self::tag((string) $parser->ICMS10->vBCFCPST, 'vBCFCPST não informado', 'N23a', 1);
      $std->pFCPST        = self::tag((string) $parser->ICMS10->pFCPST, 'pFCPST não informado', 'N23b', 1);
      $std->vFCPST        = self::tag((string) $parser->ICMS10->vFCPST, 'vFCPST não informado', 'N23d', 1);
    }
  }

  private static function ICMS20($parser, $std): void
  {
    $std->orig            = self::tag((string) $parser->ICMS20->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->ICMS20->CST, 'CST não informado', 'N12', 1);
    $std->modBC           = self::tag((string) $parser->ICMS20->modBC, 'modBC não informado', 'N13', 1);
    $std->pRedBC          = self::tag((string) $parser->ICMS20->pRedBC, 'pRedBC não informado', 'N14', 1);
    $std->vBC             = self::tag((string) $parser->ICMS20->vBC, 'vBC não informado', 'N15', 1);
    $std->pICMS           = self::tag((string) $parser->ICMS10->pICMS, 'pICMS não informado', 'N16', 1);
    $std->vICMS           = self::tag((string) $parser->ICMS10->vICMS, 'vICMS não informado', 'N17', 1);
    if ($parser->ICMS10->pFCP || $parser->ICMS10->vFCP || $parser->ICMS10->vBCFCP) {
      $std->vBCFCP        = self::tag((string) $parser->ICMS10->vBCFCP, 'vBCFCP não informado', 'N17a', 1);
      $std->pFCP          = self::tag((string) $parser->ICMS10->pFCP, 'pFCP não informado', 'N17b', 1);
      $std->vFCP          = self::tag((string) $parser->ICMS10->vFCP, 'vFCP não informado', 'N17c', 1);
    }
    if ($parser->ICMS10->vICMSDeson || $parser->ICMS10->motDesICMS) {
      $std->vICMSDeson    = self::tag((string) $parser->ICMS20->vICMSDeson, 'vICMSDeson não informado', 'N28a', 1);
      $std->motDesICMS    = self::tag((string) $parser->ICMS20->motDesICMS, 'motDesICMS não informado', 'N28b', 1);
    }
  }

  private static function ICMS30($parser, $std): void
  {
    $std->orig            = self::tag((string) $parser->ICMS30->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->ICMS30->CST, 'CST não informado', 'N12', 1);
    $std->modBCST         = self::tag((string) $parser->ICMS30->modBCST, 'modBCST não informado', 'N18', 1);
    $std->pMVAST          = self::tag((string) $parser->ICMS30->pMVAST, 'pMVAST não informado', 'N19', 0);
    $std->pRedBCST        = self::tag((string) $parser->ICMS30->pRedBCST, 'pRedBCST não informado', 'N20', 0);
    $std->vBCST           = self::tag((string) $parser->ICMS30->vBCST, 'vBCST não informado', 'N21', 1);
    $std->pICMSST         = self::tag((string) $parser->ICMS30->pICMSST, 'pICMSST não informado', 'N22', 1);
    $std->vICMSST         = self::tag((string) $parser->ICMS30->vICMSST, 'vICMSST não informado', 'N23', 1);
    if ($parser->ICMS30->vBCFCPST || $parser->ICMS30->pFCPST || $parser->ICMS30->vFCPST) {
      $std->vBCFCPST      = self::tag((string) $parser->ICMS30->vBCFCPST, 'vBCFCPST não informado', 'N23a', 1);
      $std->pFCPST        = self::tag((string) $parser->ICMS30->pFCPST, 'pFCPST não informado', 'N23b', 1);
      $std->vFCPST        = self::tag((string) $parser->ICMS30->vFCPST, 'vFCPST não informado', 'N23d', 1);
    }
    if ($parser->ICMS30->vICMSDeson || $parser->ICMS30->motDesICMS) {
      $std->vICMSDeson    = self::tag((string) $parser->ICMS30->vICMSDeson, 'vICMSDeson não informado', 'N28a', 1);
      $std->motDesICMS    = self::tag((string) $parser->ICMS30->motDesICMS, 'motDesICMS não informado', 'N28b', 1);
    }
  }

  private static function ICMS40($parser, $std): void
  {
    $parser = $parser->ICMS40;
    self::ICMS404150($parser, $std);
  }

  private static function ICMS41($parser, $std): void
  {
    $parser = $parser->ICMS41;
    self::ICMS404150($parser, $std);
  }

  private static function ICMS50($parser, $std): void
  {
    $parser = $parser->ICMS50;
    self::ICMS404150($parser, $std);
  }

  private static function ICMS404150($parser, $std): void
  {
    $std->orig            = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    if ($parser->vICMSDeson || $parser->motDesICMS) {
      $std->vICMSDeson    = self::tag((string) $parser->vICMSDeson, 'vICMSDeson não informado', 'N28a', 1);
      $std->motDesICMS    = self::tag((string) $parser->motDesICMS, 'motDesICMS não informado', 'N28b', 1);
    }
  }

  private static function ICMS51($parser, $std): void
  {
    $parser = $parser->ICMS51;

    $std->orig            = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    $std->modBC           = self::tag((string) $parser->modBC, 'modBC não informado', 'N13', 0);
    $std->pRedBC          = self::tag((string) $parser->pRedBC, 'pRedBC não informado', 'N14', 0);
    $std->vBC             = self::tag((string) $parser->vBC, 'vBC não informado', 'N15', 0);
    $std->pICMS           = self::tag((string) $parser->pICMS, 'pICMS não informado', 'N16', 0);
    $std->vICMSOp         = self::tag((string) $parser->vICMSOp, 'vICMSOP não informado', 'N16a', 0);
    $std->pDif            = self::tag((string) $parser->pDif, 'pDif não informado', 'N16b', 0);
    $std->vICMSDif        = self::tag((string) $parser->vICMSDif, 'vICMSDif não informado', 'N16c', 0);
    $std->vICMS           = self::tag((string) $parser->vICMS, 'vICMS não informado', 'N17', 1);
    if ($parser->pFCP || $parser->vFCP || $parser->vBCFCP) {
      $std->vBCFCP        = self::tag((string) $parser->vBCFCP, 'vBCFCP não informado', 'N17a', 1);
      $std->pFCP          = self::tag((string) $parser->pFCP, 'pFCP não informado', 'N17b', 1);
      $std->vFCP          = self::tag((string) $parser->vFCP, 'vFCP não informado', 'N17c', 1);
    }
  }

  private static function ICMS60($parser, $std): void
  {
    $parser = $parser->ICMS60;

    $std->orig              = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST               = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    if ($parser->vBCSTRet || $parser->pST || $parser->vICMSSubstituto || $parser->vICMSSTRet) {
      $std->vBCSTRet        = self::tag((string) $parser->vBCSTRet, 'vBCSTRet não informado', 'N26', 1);
      $std->pST             = self::tag((string) $parser->pST, 'pST não informado', 'N26a', 1);
      $std->vICMSSubstituto = self::tag((string) $parser->vICMSSubstituto, 'vICMSSubstituto não informado', 'N26b', 0);
      $std->vICMSSTRet      = self::tag((string) $parser->vICMSSTRet, 'vICMSSTRet não informado', 'N27', 1);
    }
    if ($parser->vBCFCPSTRet || $parser->pFCPSTRet || $parser->vFCPSTRet) {
      $std->vBCFCPSTRet     = self::tag((string) $parser->vBCFCPSTRet, 'vBCFCPSTRet não informado', 'N27a', 1);
      $std->pFCPSTRet       = self::tag((string) $parser->pFCPSTRet, 'pFCPSTRet não informado', 'N27b', 1);
      $std->vFCPSTRet       = self::tag((string) $parser->vFCPSTRet, 'vFCPSTRet não informado', 'N27d', 1);
    }
    if ($parser->pRedBCEfet || $parser->vBCEfet || $parser->pICMSEfet || $parser->vICMSEfet) {
      $std->pRedBCEfet      = self::tag((string) $parser->pRedBCEfet, 'pRedBCEfet não informado', 'N34', 1);
      $std->vBCEfet         = self::tag((string) $parser->vBCEfet, 'vBCEfet não informado', 'N35', 1);
      $std->pICMSEfet       = self::tag((string) $parser->pICMSEfet, 'pICMSEfet não informado', 'N36', 1);
      $std->vICMSEfet       = self::tag((string) $parser->vICMSEfet, 'vICMSEfet não informado', 'N37', 1);
    }
  }

  private static function ICMS70($parser, $std): void
  {
    $parser = $parser->ICMS70;

    $std->orig              = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST               = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    $std->modBC             = self::tag((string) $parser->modBC, 'modBC não informado', 'N13', 1);
    $std->pRedBC            = self::tag((string) $parser->pRedBC, 'pRedBC não informado', 'N14', 1);
    $std->vBC               = self::tag((string) $parser->vBC, 'vBC não informado', 'N15', 1);
    $std->pICMS             = self::tag((string) $parser->pICMS, 'pICMS não informado', 'N16', 1);
    $std->vICMS             = self::tag((string) $parser->vICMS, 'vICMS não informado', 'N17', 1);
    if ($parser->pFCP || $parser->vFCP || $parser->vBCFCP) {
      $std->vBCFCP        = self::tag((string) $parser->vBCFCP, 'vBCFCP não informado', 'N17a', 1);
      $std->pFCP          = self::tag((string) $parser->pFCP, 'pFCP não informado', 'N17b', 1);
      $std->vFCP          = self::tag((string) $parser->vFCP, 'vFCP não informado', 'N17c', 1);
    }
    $std->modBCST         = self::tag((string) $parser->modBCST, 'modBCST não informado', 'N18', 1);
    $std->pMVAST          = self::tag((string) $parser->pMVAST, 'pMVAST não informado', 'N19', 0);
    $std->pRedBCST        = self::tag((string) $parser->pRedBCST, 'pRedBCST não informado', 'N20', 0);
    $std->vBCST           = self::tag((string) $parser->vBCST, 'vBCST não informado', 'N21', 1);
    $std->pICMSST         = self::tag((string) $parser->pICMSST, 'pICMSST não informado', 'N22', 1);
    $std->vICMSST         = self::tag((string) $parser->vICMSST, 'vICMSST não informado', 'N23', 1);
    if ($parser->vBCFCPST || $parser->pFCPST || $parser->vFCPST) {
      $std->vBCFCPST      = self::tag((string) $parser->vBCFCPST, 'vBCFCPST não informado', 'N23a', 1);
      $std->pFCPST        = self::tag((string) $parser->pFCPST, 'pFCPST não informado', 'N23b', 1);
      $std->vFCPST        = self::tag((string) $parser->vFCPST, 'vFCPST não informado', 'N23d', 1);
    }
    if ($parser->vICMSDeson || $parser->motDesICMS) {
      $std->vICMSDeson    = self::tag((string) $parser->vICMSDeson, 'vICMSDeson não informado', 'N28a', 1);
      $std->motDesICMS    = self::tag((string) $parser->motDesICMS, 'motDesICMS não informado', 'N28b', 1);
    }
  }

  private static function ICMS90($parser, $std): void
  {
    $parser = $parser->ICMS90;

    $std->orig            = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    if ($parser->modBC || $parser->pRedBC || $parser->vBC || $parser->pICMS || $parser->vICMS) {
      $std->modBC         = self::tag((string) $parser->modBC, 'modBC não informado', 'N13', 1);
      $std->pRedBC        = self::tag((string) $parser->pRedBC, 'pRedBC não informado', 'N14', 0);
      $std->vBC           = self::tag((string) $parser->vBC, 'vBC não informado', 'N15', 1);
      $std->pICMS         = self::tag((string) $parser->pICMS, 'pICMS não informado', 'N16', 1);
      $std->vICMS         = self::tag((string) $parser->vICMS, 'vICMS não informado', 'N17', 1);
    }
    if ($parser->pFCP || $parser->vFCP || $parser->vBCFCP) {
      $std->vBCFCP        = self::tag((string) $parser->vBCFCP, 'vBCFCP não informado', 'N17a', 1);
      $std->pFCP          = self::tag((string) $parser->pFCP, 'pFCP não informado', 'N17b', 1);
      $std->vFCP          = self::tag((string) $parser->vFCP, 'vFCP não informado', 'N17c', 1);
    }
    if ($parser->modBCST || $parser->pMVAST || $parser->pRedBCST || $parser->vBCST || $parser->pICMSST || $parser->vICMSST) {
      $std->modBCST       = self::tag((string) $parser->modBCST, 'modBCST não informado', 'N18', 1);
      $std->pMVAST        = self::tag((string) $parser->pMVAST, 'pMVAST não informado', 'N19', 0);
      $std->pRedBCST      = self::tag((string) $parser->pRedBCST, 'pRedBCST não informado', 'N20', 0);
      $std->vBCST         = self::tag((string) $parser->vBCST, 'vBCST não informado', 'N21', 1);
      $std->pICMSST       = self::tag((string) $parser->pICMSST, 'pICMSST não informado', 'N22', 1);
      $std->vICMSST       = self::tag((string) $parser->vICMSST, 'vICMSST não informado', 'N23', 1);
    }
    if ($parser->vBCFCPST || $parser->pFCPST || $parser->vFCPST) {
      $std->vBCFCPST      = self::tag((string) $parser->vBCFCPST, 'vBCFCPST não informado', 'N23a', 1);
      $std->pFCPST        = self::tag((string) $parser->pFCPST, 'pFCPST não informado', 'N23b', 1);
      $std->vFCPST        = self::tag((string) $parser->vFCPST, 'vFCPST não informado', 'N23d', 1);
    }
    if ($parser->vICMSDeson || $parser->motDesICMS) {
      $std->vICMSDeson    = self::tag((string) $parser->vICMSDeson, 'vICMSDeson não informado', 'N28a', 1);
      $std->motDesICMS    = self::tag((string) $parser->motDesICMS, 'motDesICMS não informado', 'N28b', 1);
    }
  }

  //Continue...
  private static function ICMSPart($parser, $std): void
  {
    $parser = $parser->ICMSPart;

    $std->orig            = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    $std->modBC           = self::tag((string) $parser->modBC, 'modBC não informado', 'N13', 1);
    $std->pRedBC          = self::tag((string) $parser->pRedBC, 'pRedBC não informado', 'N14', 0);
    $std->vBC             = self::tag((string) $parser->vBC, 'vBC não informado', 'N15', 1);
    $std->pICMS           = self::tag((string) $parser->pICMS, 'pICMS não informado', 'N16', 1);
    $std->vICMS           = self::tag((string) $parser->vICMS, 'vICMS não informado', 'N17', 1);
    $std->modBCST         = self::tag((string) $parser->modBCST, 'modBCST não informado', 'N18', 1);
    $std->pMVAST          = self::tag((string) $parser->pMVAST, 'pMVAST não informado', 'N19', 0);
    $std->pRedBCST        = self::tag((string) $parser->pRedBCST, 'pRedBCST não informado', 'N20', 0);
    $std->vBCST           = self::tag((string) $parser->vBCST, 'vBCST não informado', 'N21', 1);
    $std->pICMSST         = self::tag((string) $parser->pICMSST, 'pICMSST não informado', 'N22', 1);
    $std->vICMSST         = self::tag((string) $parser->vICMSST, 'vICMSST não informado', 'N23', 1);
    $std->pBCOp           = self::tag((string) $parser->pBCOp, 'vICMSST não informado', 'N25', 1);
    $std->UFST            = self::tag((string) $parser->UFST, 'vICMSST não informado', 'N24', 1);
  }

  private static function ICMSST($parser, $std): void
  {
    $parser = $parser->ICMSST;

    $std->orig            = self::tag((string) $parser->orig, 'orig não informado', 'N11', 1);
    $std->CST             = self::tag((string) $parser->CST, 'CST não informado', 'N12', 1);
    $std->vBCSTRet        = self::tag((string) $parser->vBCSTRet, 'vBCSTRet não informado', 'N26', 1);
    $std->pST             = self::tag((string) $parser->pST, 'pST não informado', 'N26a', 0);
    $std->vICMSSubstituto = self::tag((string) $parser->vICMSSubstituto, 'vICMSSubstituto não informado', 'N26b', 0);
    $std->vICMSSTRet      = self::tag((string) $parser->vICMSSTRet, 'vICMSSTRet não informado', 'N27', 1);
    if ($parser->vBCFCPSTRet || $parser->pFCPSTRet || $parser->vFCPSTRet) {
      $std->vBCFCPSTRet   = self::tag((string) $parser->vBCFCPSTRet, 'vBCFCPSTRet não informado', 'N27a', 1);
      $std->pFCPSTRet     = self::tag((string) $parser->pFCPSTRet, 'pFCPSTRet não informado', 'N27b', 1);
      $std->vFCPSTRet     = self::tag((string) $parser->vFCPSTRet, 'vFCPSTRet não informado', 'N27d', 1);
    }
    $std->vBCSTDest       = self::tag((string) $parser->vBCSTDest, 'vBCSTDest não informado', 'N31', 1);
    $std->vICMSSTDest     = self::tag((string) $parser->vICMSSTDest, 'vICMSSTDest não informado', 'N32', 1);
    if ($parser->pRedBCEfet || $parser->vBCEfet || $parser->pICMSEfet || $parser->vICMSEfet) {
      $std->pRedBCEfet    = self::tag((string) $parser->pRedBCEfet, 'pRedBCEfet não informado', 'N34', 1);
      $std->vBCEfet       = self::tag((string) $parser->vBCEfet, 'vBCEfet não informado', 'N35', 1);
      $std->pICMSEfet     = self::tag((string) $parser->pICMSEfet, 'pICMSEfet não informado', 'N36', 1);
      $std->vICMSEfet     = self::tag((string) $parser->vICMSEfet, 'vICMSEfet não informado', 'N37', 1);
    }
  }

  private static function ICMSSN101($parser, $std): void
  {
    $parser = $parser->ICMSSN101;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CSOSN;
    $std->icms_aliquota_credito_simples         = (string) $parser->pCredSN;
  }

  private static function ICMSSN102($parser, $std): void
  {
    $parser = $parser->ICMSSN102;
    self::ICMSSN102103300400($parser, $std);
  }

  private static function ICMSSN103($parser, $std): void
  {
    $parser = $parser->ICMSSN103;
    self::ICMSSN102103300400($parser, $std);
  }

  private static function ICMSSN300($parser, $std): void
  {
    $parser = $parser->ICMSSN300;
    self::ICMSSN102103300400($parser, $std);
  }

  private static function ICMSSN400($parser, $std): void
  {
    $parser = $parser->ICMSSN400;
    self::ICMSSN102103300400($parser, $std);
  }

  private static function ICMSSN102103300400($parser, $std): void
  {
    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CSOSN;
  }

  private static function ICMSSN201($parser, $std): void
  {
    $parser = $parser->ICMSSN201;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CSOSN;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->pICMSST;
    $std->icms_valor_st                         = (string) $parser->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->vFCPST;
    $std->icms_aliquota_credito_simples         = (string) $parser->pCredSN;
    $std->icms_valor_credito_simples            = (string) $parser->vCredICMSSN;
  }

  private static function ICMSSN202($parser, $std): void
  {
    $parser = $parser->ICMSSN202;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CSOSN;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->pICMSST;
    $std->icms_valor_st                         = (string) $parser->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->vFCPST;
  }

  private static function ICMSSN500($parser, $std): void
  {
    $parser = $parser->ICMSSN500;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CSOSN;
    $std->icms_base_calculo_retido_remetente    = (string) $parser->vBCSTRet;
    $std->icms_aliquota_final                   = (string) $parser->pST;
    $std->icms_valor_substituto                 = (string) $parser->vICMSSubstituto;
    $std->icms_valor_retido_st                  = (string) $parser->vICMSSTRet;
    $std->fcp_base_calculo_retido_st            = (string) $parser->vBCFCPSTRet;
    $std->fcp_percentual_retido_st              = (string) $parser->pFCPSTRet;
    $std->fcp_valor_retido_st                   = (string) $parser->vFCPSTRet;
    $std->icms_reducao_base_calculo_efetiva     = (string) $parser->pRedBCEfet;
    $std->icms_base_calculo_efetiva             = (string) $parser->vBCEfet;
    $std->icms_aliquota_efetiva                 = (string) $parser->pICMSEfet;
    $std->icms_valor_efetivo                    = (string) $parser->vICMSEfet;
  }

  private static function ICMSSN900($parser, $std): void
  {
    $parser = $parser->ICMSSN900;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CSOSN;
    $std->icms_modalidade_base_calculo          = (int) $parser->modBC;
    $std->icms_base_calculo                     = (string) $parser->vBC;
    $std->icms_reducao_base_calculo             = (string) $parser->pRedBC;
    $std->icms_aliquota                         = (string) $parser->pICMS;
    $std->icms_valor                            = (string) $parser->vICMS;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->pICMSST;
    $std->icms_valor_st                         = (string) $parser->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->vFCPST;
    $std->icms_aliquota_credito_simples         = (string) $parser->pCredSN;
    $std->icms_valor_credito_simples            = (string) $parser->vCredICMSSN;
  }
}
