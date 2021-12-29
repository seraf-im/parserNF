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

namespace Pnhs\ParserXml\layout;

use stdClass;
use Pnhs\ParserXml\enums\{
  Uf,
  IndPag,
  Mod,
  TpNF,
  IdDest,
  TpImp,
  TpEmis,
  TpAmb,
  FinNFe,
  IndFinal,
  IndPres,
  IndIntermed,
  ProcEmi
};

class b
{
  public static function run(object $data): stdClass
  {
    $parser = $data->NFe->infNFe->ide;
    $std = new stdClass;

    $std->codigo_uf                           = Uf::from((int)$parser->cUF);
    $std->codigo_unico                        = (int) $parser->cNF;
    $std->natureza_operacao                   = (string) $parser->natOp;
    $std->modelo                              = Mod::from((string) $parser->mod);
    $std->serie                               = (int) $parser->serie;
    $std->numero                              = (int) $parser->nNF;
    $std->data_emissao                        = strtotime((string) $parser->dhEmi);
    if ($parser->dhSaiEnt)
      $std->data_entrada_saida                = strtotime((string) $parser->dhSaiEnt);
    $std->tipo_documento                      = TpNF::from((int) $parser->tpNF);
    $std->local_destino                       = IdDest::from((int) $parser->idDest);
    $std->codigo_municipio                    = (int) $parser->cMunFG;
    $std->tipo_impressao                      = TpImp::from((int) $parser->tpImp);
    $std->tipo_emissao                        = TpEmis::from((int) $parser->tpEmis);
    $std->digito_verificador                  = (int) $parser->cDV;
    $std->tipo_ambiente                       = TpAmb::from((int) $parser->tpAmb);
    $std->finalidade_emissao                  = FinNFe::from((int) $parser->finNFe);
    $std->consumidor_final                    = IndFinal::from((int) $parser->indFinal);
    $std->presenca_comprador                  = IndPres::from((int) $parser->indPres);
    if ($parser->indIntermed)
      $std->indicador_intermediario           = IndIntermed::from((int) $parser->indIntermed);
    $std->emissor                             = ProcEmi::from((int) $parser->procEmi);
    $std->versao_emissor                      = (string) $parser->verProc;
    $std->data_contigencia                    = strtotime((string) $parser->dhCont);
    $std->justificativa_contigencia           = (string) $parser->xJust;

    return $std;
  }
}
