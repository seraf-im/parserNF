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

class ba
{
  public static function run($data): array
  {
    $parser = $data->NFe->infNFe->ide->NFref;
    $return = [];
    $i = 0;

    if (!$data->NFe->infNFe->ide->NFref)
      return [];

    foreach ($parser as $item) {
      $std = new stdClass;
      if ($item->refNFe)
        $std->chave_nfe                           = (string) $item->refNFe;
      if ($item->refNF)
        self::refNF($parser->refNF, $std);
      if ($item->refNFP)
        self::refNFP($parser->refNFP, $std);
      if ($item->refECF)
        self::refECF($parser->refECF, $std);

      $return[$i] = $std;
      $i++;
    }

    return $return;
  }

  private static function refNF(object $parser, stdClass $std): void
  {
    $std->uf                                  = Uf::from((int) $parser->cUF);
    $std->mes                                 = (int) $parser->AAMM;
    $std->cnpj                                = (string) $parser->CNPJ;
    $std->modelo                              = Mod::from((string) $parser->mod);
    $std->serie                               = (int) $parser->serie;
    $std->numero                              = (int) $parser->nNF;
  }

  private static function refNFP(object $parser, stdClass $std): void
  {
    $std->uf_nf_produtor                      = Uf::from((int) $parser->cUF);
    $std->mes_nf_produtor                     = (int) $parser->AAMM;
    $std->cnpj_nf_produtor                    = (string) $parser->CNPJ;
    $std->cpf_nf_produtor                     = (string) $parser->CPF;
    $std->inscricao_estadual_nf_produtor      = (string) $parser->IE;
    $std->modelo_nf_produtor                  = Mod::from((string) $parser->mod);
    $std->serie_nf_produtor                   = (int) $parser->serie;
    $std->numero_nf_produtor                  = (int) $parser->nNF;
    $std->chave_cte                           = (string) $parser->refCTe;
  }

  private static function refECF(object $parser, stdClass $std): void
  {
    $std->modelo_ecf                          = Mod::from((string) $parser->mod);
    $std->numero_ecf                          = (string) $parser->nECF;
    $std->coo                                 = (int) $parser->nCOO;
  }
}
