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

class x
{
  public static function run(object $data): stdClass
  {
    $std = new stdClass;

    $parser = $data->NFe->infNFe->transp;

    $std->modalidade_frete                      = (string) $parser->modFrete;

    if ($parser->transporta)
      self::transporta($parser, $std);

    if ($parser->retTransp)
      self::retTransp($parser, $std);

    if ($parser->veicTransp)
      self::veicTransp($parser, $std);

    if ($parser->reboque)
      self::reboque($parser, $std);

    if ($parser->vol)
      self::vol($parser, $std);

    if ($parser->lacres)
      self::lacres($parser, $std);

    return $std;
  }

  private static function transporta($parser, $std): void
  {
    $std->cnpj_transportador                    = (string) $parser->CNPJ;
    $std->cpf_transportador                     = (string) $parser->CPF;
    $std->nome_transportador                    = (string) $parser->xNome;
    $std->inscricao_estadual_transportador      = (string) $parser->IE;
    $std->endereco_transportador                = (string) $parser->xEnder;
    $std->municipio_transportador               = (string) $parser->xMun;
    $std->uf_transportador                      = (string) $parser->UF;
  }

  private static function retTransp($parser, $std): void
  {
    $std->transporte_icms_servico               = (string) $parser->vServ;
    $std->transporte_icms_base_calculo          = (string) $parser->vBCRet;
    $std->transporte_icms_aliquota              = (string) $parser->pICMSRet;
    $std->transporte_icms_valor                 = (string) $parser->vICMSRet;
    $std->transporte_icms_cfop                  = (string) $parser->CFOP;
    $std->transporte_icms_codigo_municipio      = (string) $parser->cMunFG;
  }

  private static function veicTransp($parser, $std): void
  {
    $std->veiculo_placa                         = (string) $parser->placa;
    $std->veiculo_uf                            = (string) $parser->UF;
    $std->veiculo_rntc                          = (string) $parser->RNTC;
  }

  private static function reboque($parser, $std): void
  {
  }

  private static function vol($parser, $std): void
  {
  }

  private static function lacres($parser, $std): void
  {
  }
}
