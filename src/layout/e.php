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

class e
{
  public static function run(object $data): stdClass
  {
    $parser = $data->NFe->infNFe->dest;
    $std = new stdClass;

    if ($parser->CNPJ)
      $std->cnpj_destinatario                         = (string) $parser->CNPJ;
    if ($parser->CPF)
      $std->cpf_destinatario                          = (string) $parser->CPF;
    if ($parser->idEstrangeiro)
      $std->id_estrangeiro_destinatario               = (string) $parser->idEstrangeiro;
    $std->nome_destinatario                           = (string) $parser->xNome;

    $std->indicador_inscricao_estadual_destinatario   = (string) $parser->indIEDest;
    if ($parser->IE)
      $std->inscricao_estadual_destinatario           = (string) $parser->IE;
    if ($parser->ISUF)
      $std->inscricao_suframa_destinatario            = (string) $parser->ISUF;
    if ($parser->IM)
      $std->inscricao_municipal_destinatario          = (string) $parser->IM;
    if ($parser->email)
      $std->email_destinatario                        = (string) $parser->email;

    self::enderDest($parser->enderDest, $std);

    return $std;
  }

  private static function enderDest(object $parser, stdClass $std): void
  {
    $std->logradouro_destinatario                     = (string) $parser->xLgr;
    $std->numero_destinatario                         = (string) $parser->nro;
    if ($parser->xCpl)
      $std->complemento_destinatario                  = (string) $parser->xCpl;
    $std->bairro_destinatario                         = (string) $parser->xBairro;
    $std->codigo_municipio_destinatario               = (string) $parser->cMun;
    $std->municipio_destinatario                      = (string) $parser->xMun;
    $std->uf_destinatario                             = (string) $parser->UF;
    $std->cep_destinatario                            = (string) $parser->CEP;
    $std->codigo_pais_destinatario                    = (string) $parser->cPais;
    $std->pais_destinatario                           = (string) $parser->xPais;
    if ($parser->fone)
      $std->telefone_destinatario                     = (string) $parser->fone;
  }
}
