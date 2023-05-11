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

class c
{
  public static function run($data): stdClass
  {
    $parser = $data->NFe->infNFe->emit;
    $std = new stdClass;

    if ($parser->CNPJ)
      $std->cnpj_emitente                     = (string) $parser->CNPJ;
    if ($parser->CPF)
      $std->cpf_emitente                      = (string) $parser->CPF;
    $std->nome_emitente                       = (string) $parser->xNome;
    if ($parser->xFant)
      $std->nome_fantasia_emitente            = (string) $parser->xFant;
    $std->inscricao_estadual_emitente         = (string) $parser->IE;
    if ($parser->IEST)
      $std->inscricao_estadual_st_emitente      = (string) $parser->IEST;
    if ($parser->IM)
      $std->inscricao_municipal_emitente        = (string) $parser->IM;
    if ($parser->CNAE)
      $std->cnae_fiscal_emitente                = (string) $parser->CNAE;
    $std->regime_tributario_emitente          = CRT::from((int) $parser->CRT);

    self::enderEmit($parser->enderEmit, $std);

    return $std;
  }

  private static function enderEmit(object $parser, stdClass $std): void
  {
    $std->logradouro_emitente                 = (string) $parser->xLgr;
    $std->numero_emitente                     = (string) $parser->nro;
    if ($parser->xCpl)
      $std->complemento_emitente              = (string) $parser->xCpl;
    $std->bairro_emitente                     = (string) $parser->xBairro;
    $std->codigo_municipio_emitente           = (string) $parser->cMun;
    $std->municipio_emitente                  = (string) $parser->xMun;
    $std->uf_emitente                         = (string) $parser->UF;
    $std->cep_emitente                        = (string) $parser->CEP;
    if ($parser->cPais)
      $std->codigo_pais_emitente              = (string) $parser->cPais;
    if ($parser->xPais)
      $std->pais_emitente                     = (string) $parser->xPais;
    if ($parser->fone)
      $std->telefone_emitente                 = (string) $parser->fone;
  }
}
