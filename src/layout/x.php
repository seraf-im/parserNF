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

class x extends layout
{
  public static function run(object $data): stdClass
  {
    $std = new stdClass;

    $parser = $data->NFe->infNFe->transp;

    $std->modFrete        = self::tag((string) $parser->modFrete, 'modFrete não informado', 'X02', 1);

    if ($parser->transporta)
      self::transporta($parser->transporta, $std);

    if ($parser->retTransp)
      self::retTransp($parser->retTransp, $std);

    if ($parser->veicTransp)
      self::veicTransp($parser->veicTransp, $std);

    if ($parser->reboque)
      self::reboque($parser->reboque, $std);

    if ($parser->vol)
      self::vol($parser->vol, $std);

    return $std;
  }

  private static function transporta($parser, $std): void
  {
    $std->CNPJ            = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'X04', 0);
    $std->CPF             = self::tag((string) $parser->CPF, 'CPF não informado', 'X05', 0);
    $std->xNome           = self::tag((string) $parser->xNome, 'xNome não informado', 'X06', 0);
    $std->IE              = self::tag((string) $parser->IE, 'IE não informado', 'X07', 0);
    $std->xEnder          = self::tag((string) $parser->xEnder, 'xEnder não informado', 'X08', 0);
    $std->xMun            = self::tag((string) $parser->xMun, 'xMun não informado', 'X09', 0);
    $std->UF              = self::tag((string) $parser->UF, 'UF não informado', 'X10', 0);
  }

  private static function retTransp($parser, $std): void
  {
    $std->vServ           = self::tag((string) $parser->vServ, 'vServ não informado', 'X12', 1);
    $std->vBCRet          = self::tag((string) $parser->vBCRet, 'vBCRet não informado', 'X13', 1);
    $std->pICMSRet        = self::tag((string) $parser->pICMSRet, 'pICMSRet não informado', 'X14', 1);
    $std->vICMSRet        = self::tag((string) $parser->vICMSRet, 'vICMSRet não informado', 'X15', 1);
    $std->CFOP            = self::tag((string) $parser->CFOP, 'CFOP não informado', 'X16', 1);
    $std->cMunFG          = self::tag((string) $parser->cMunFG, 'cMunFG não informado', 'X17', 1);
  }

  private static function veicTransp($parser, $std): void
  {
    $std->placa           = self::tag((string) $parser->placa, 'placa não informado', 'X19', 1);
    $std->UF              = self::tag((string) $parser->UF, 'UF não informado', 'X20', 1);
    $std->RNTC            = self::tag((string) $parser->RNTC, 'RNTC não informado', 'X21', 0);
  }

  private static function reboque($parser, $std): void
  {
    $i = 0;
    foreach ($parser as $item) {
      $r[$i]['placa']     = self::tag((string) $item->placa, 'placa não informado', 'X23', 1);
      $r[$i]['UF']        = self::tag((string) $item->UF, 'UF não informado', 'X24', 1);
      $r[$i]['RNTC']      = self::tag((string) $item->RNTC, 'RNTC não informado', 'X25', 0);
      $r[$i]['vagao']     = self::tag((string) $item->vagao, 'vagao não informado', 'X25a', 0);
      $r[$i]['balsa']     = self::tag((string) $item->balsa, 'balsa não informado', 'X25b', 0);
      $std->reboque = $r;
      $i++;
    }
  }

  private static function vol($parser, $std): void
  {
    $i = 0;
    foreach ($parser as $item) {
      $r[$i]['qVol']      = self::tag((string) $item->qVol, 'qVol não informado', 'X27', 0);
      $r[$i]['esp']       = self::tag((string) $item->esp, 'esp não informado', 'X28', 0);
      $r[$i]['marca']     = self::tag((string) $item->marca, 'marca não informado', 'X29', 0);
      $r[$i]['nVol']      = self::tag((string) $item->nVol, 'nVol não informado', 'X30', 0);
      $r[$i]['pesoL']     = self::tag((string) $item->pesoL, 'pesoL não informado', 'X31', 0);
      $r[$i]['pesoB']     = self::tag((string) $item->pesoB, 'pesoB não informado', 'X32', 0);
      if ($item->lacres)
        $r[$i]['lacres']  = self::lacres($item->lacres);
      $std->vol->$i = $r;
      $i++;
    }
  }

  private static function lacres($parser): array
  {
    $i = 0;
    $r = [];
    foreach ($parser as $item) {
      $r[$i]['nLacre']    = self::tag((string) $item->nLacre, 'nLacre não informado', 'X27', 1);
      $i++;
    }

    return $r;
  }
}
