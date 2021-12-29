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

class w
{
  public static function run(object $data): stdClass
  {
    $std = new stdClass;

    $parser = $data->NFe->infNFe->total;

    $group = key(get_object_vars($parser));

    self::$group($parser, $std);

    return $std;
  }

  private static function ICMSTot($parser, $std): void
  {
    $parser = $parser->ICMSTot;

    $std->icms_base_calculo                     = (string) $parser->vBC;
    $std->icms_valor                            = (string) $parser->vICMS;
    $std->icms_valor_desonerado                 = (string) $parser->vICMSDeson;
    $std->fcp_valor_uf_destino                  = (string) $parser->vFCPUFDest;
    $std->icms_valor_uf_destino                 = (string) $parser->vICMSUFDest;
    $std->icms_valor_total_uf_remetente         = (string) $parser->vICMSUFRemet;
    $std->fcp_valor_total                       = (string) $parser->vFCP;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_valor_total_st                   = (string) $parser->vST;
    $std->fcp_valor_total_st                    = (string) $parser->vFCPST;
    $std->fcp_valor_total_retido_st             = (string) $parser->vFCPSTRet;
    $std->valor_produtos                        = (string) $parser->vProd;
    $std->valor_frete                           = (string) $parser->vFrete;
    $std->valor_seguro                          = (string) $parser->vSeg;
    $std->valor_desconto                        = (string) $parser->vDesc;
    $std->valor_total_ii                        = (string) $parser->vII;
    $std->valor_ipi                             = (string) $parser->vIPI;
    $std->valor_ipi_devolvido                   = (string) $parser->vIPIDevol;
    $std->valor_pis                             = (string) $parser->vPIS;
    $std->valor_cofins                          = (string) $parser->vCOFINS;
    $std->valor_outras_despesas                 = (string) $parser->valor_outras_despesas;
    $std->valor_total                           = (string) $parser->valor_total;
    $std->valor_total_tributos                  = (string) $parser->valor_total_tributos;
  }

  private static function ISSQNtot($parser, $std): void
  {
    $parser = $parser->ISSQNtot;

    $std->valor_total_servicos                  = (string) $parser->vServ;
    $std->issqn_base_calculo                    = (string) $parser->vBC;
    $std->issqn_valor_total                     = (string) $parser->vISS;
    $std->valor_pis_servicos                    = (string) $parser->vPIS;
    $std->valor_cofins_servicos                 = (string) $parser->vCOFINS;
    $std->data_prestacao_servico                = (string) $parser->dCompet;
    $std->issqn_valor_total_deducao             = (string) $parser->vDeducao;
    $std->issqn_valor_total_outras_retencoes    = (string) $parser->vOutro;
    $std->issqn_valor_total_desconto_incondicionado = (string) $parser->vDescIncond;
    $std->issqn_valor_total_desconto_condicionado   = (string) $parser->vDescCond;
    $std->issqn_valor_total_retencao                = (string) $parser->vISSRet;
    $std->codigo_regime_especial_tributacao         = (int) $parser->cRegTrib;
  }

  private static function COFINSNT($parser, $std): void
  {
    $parser = $parser->COFINSNT;

    $std->cofins_situacao_tributaria            = (string) $parser->CST;
  }

  private static function COFINSOutr($parser, $std): void
  {
    $parser = $parser->COFINSOutr;

    $std->cofins_base_calculo                   = (string) $parser->vBC;
    $std->cofins_aliquota_porcentual            = (string) $parser->pCOFINS;
    $std->cofins_quantidade_vendida             = (string) $parser->qBCProd;
    $std->cofins_aliquota_valor                 = (string) $parser->vAliqProd;
    $std->cofins_valor                          = (string) $parser->vCOFINS;
  }
}
