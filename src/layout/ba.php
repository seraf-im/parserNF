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
  Uf,
  Mod
};

class ba extends layout
{
  public static function run($data): array
  {
    if (!$data) return null;
    $parser = $data->NFe->infNFe->ide->NFref;
    $return = [];
    $i = 0;

    if (!$data->NFe->infNFe->ide->NFref)
      return [];

    self::tag($parser, 'Ultrapassou o máximo de referências permitidas', 'BA01', 0, 500);

    foreach ($parser as $item) {
      $std = new stdClass;
      $std->refNFe  = self::tag((string) $item->refNFe, 'refNFe não informado', 'BA02', 0);
      $std->refCTe  = self::tag((string) $item->refCTe, 'refCTe não informado', 'BA19', 0);
      if ($item->refNF)
        self::refNF($item->refNF, $std);
      if ($item->refNFP)
        self::refNFP($item->refNFP, $std);
      if ($item->refECF)
        self::refECF($item->refECF, $std);

      $return[$i] = $std;
      $i++;
    }

    return $return;
  }

  private static function refNF(object $parser, stdClass $std): void
  {
    $std->cUF           = Uf::from((int) self::tag((string)$parser->cUF, 'cUF não informado', 'BA04', 1));
    $std->AAMM          = self::tag((string) $parser->AAMM, 'AAMM não informado', 'BA05', 1);
    $std->CNPJ          = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'BA06', 1);
    $std->mod           = Mod::from((string) self::tag((string) $parser->mod, 'mod não informado', 'BA07', 1));
    $std->serie         = self::tag((string) $parser->serie, 'serie não informado', 'BA08', 1);
    $std->nNF           = self::tag((string) $parser->nNF, 'nNF não informado', 'BA09', 1);
  }

  private static function refNFP(object $parser, stdClass $std): void
  {
    $std->refNFP_cUF    = Uf::from((int) self::tag((string)$parser->cUF, 'cUF não informado', 'BA11', 1));
    $std->refNFP_AAMM   = self::tag((string) $parser->AAMM, 'AAMM não informado', 'BA12', 1);
    $std->refNFP_CNPJ   = self::tag((string) $parser->CNPJ, 'CNPJ não informado', 'BA13', 1);
    $std->refNFP_CPF    = self::tag((string) $parser->CPF, 'CPF não informado', 'BA14', 1);
    $std->refNFP_IE     = self::tag((string) $parser->IE, 'IE não informado', 'BA15', 1);
    $std->refNFP_mod    = Mod::from((string) self::tag((string) $parser->mod, 'mod não informado', 'BA16', 1));
    $std->refNFP_serie  = self::tag((string) $parser->serie, 'serie não informado', 'BA17', 1);
    $std->refNFP_nNF    = self::tag((string) $parser->nNF, 'nNF não informado', 'BA18', 1);
  }

  private static function refECF(object $parser, stdClass $std): void
  {
    $std->refECF_mod   = Mod::from((string) self::tag((string) $parser->mod, 'mod não informado', 'BA21', 1));
    $std->refECF_nECF  = self::tag((string) $parser->nECF, 'nECF não informado', 'BA22', 1);
    $std->refECF_nCOO  = self::tag((string) $parser->nCOO, 'nCOO não informado', 'BA23', 1);
  }
}
