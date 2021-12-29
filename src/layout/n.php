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

class n
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->NFe->infNFe->det->imposto[$numero_item - 1]->ICMS;

    $group = key(get_object_vars($parser));

    self::$group($parser, $std);

    return $std;
  }

  private static function ICMS00($parser, $std): void
  {
    $std->icms_origem                           = (int) $parser->ICMS00->orig;
    $std->icms_situacao_tributaria              = (int) $parser->ICMS00->CST;
    $std->icms_modalidade_base_calculo          = (int) $parser->ICMS00->modBC;
    $std->icms_base_calculo                     = (string) $parser->ICMS00->vBC;
    $std->icms_aliquota                         = (string) $parser->ICMS00->pICMS;
    $std->icms_valor                            = (string) $parser->ICMS00->vICMS;
    $std->fcp_percentual                        = (string) $parser->pFCP;
    $std->fcp_valor                             = (string) $parser->vFCP;
  }

  private static function ICMS10($parser, $std): void
  {
    $std->icms_origem                           = (int) $parser->ICMS10->orig;
    $std->icms_situacao_tributaria              = (int) $parser->ICMS10->CST;
    $std->icms_modalidade_base_calculo          = (int) $parser->ICMS10->modBC;
    $std->icms_base_calculo                     = (string) $parser->ICMS10->vBC;
    $std->icms_aliquota                         = (string) $parser->ICMS10->pICMS;
    $std->icms_valor                            = (string) $parser->ICMS10->vICMS;
    $std->fcp_base_calculo                      = (string) $parser->ICMS10->vBCFCP;
    $std->fcp_percentual                        = (string) $parser->ICMS10->pFCP;
    $std->fcp_valor                             = (string) $parser->ICMS10->vFCP;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->ICMS10->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->ICMS10->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->ICMS10->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->ICMS10->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->ICMS10->pICMSST;
    $std->icms_valor_st                         = (string) $parser->ICMS10->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->ICMS10->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->ICMS10->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->ICMS10->vFCPST;
  }

  private static function ICMS20($parser, $std): void
  {
    $parser = $parser->ICMS20;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_modalidade_base_calculo          = (int) $parser->modBC;
    $std->icms_reducao_base_calculo             = (string) $parser->pRedBC;
    $std->icms_base_calculo                     = (string) $parser->vBC;
    $std->icms_aliquota                         = (string) $parser->pICMS;
    $std->icms_valor                            = (string) $parser->vICMS;
    $std->fcp_base_calculo                      = (string) $parser->vBCFCP;
    $std->fcp_percentual                        = (string) $parser->pFCP;
    $std->fcp_valor                             = (string) $parser->vFCP;
    $std->icms_valor_desonerado                 = (string) $parser->vICMSDeson;
    $std->icms_motivo_desoneracao               = (int) $parser->motDesICMS;
  }

  private static function ICMS30($parser, $std): void
  {
    $parser = $parser->ICMS30;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->pICMSST;
    $std->icms_valor_st                         = (string) $parser->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->vFCPST;
    $std->icms_valor_desonerado                 = (string) $parser->vICMSDeson;
    $std->icms_motivo_desoneracao               = (int) $parser->motDesICMS;
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
    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_valor_desonerado                 = (string) $parser->vICMSDeson;
    $std->icms_motivo_desoneracao               = (int) $parser->motDesICMS;
  }

  private static function ICMS51($parser, $std): void
  {
    $parser = $parser->ICMS51;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_modalidade_base_calculo          = (int) $parser->modBC;
    $std->icms_reducao_base_calculo             = (string) $parser->pRedBC;
    $std->icms_base_calculo                     = (string) $parser->vBC;
    $std->icms_aliquota                         = (string) $parser->pICMS;
    $std->icms_valor_operacao                   = (string) $parser->vICMSOp;
    $std->icms_percentual_diferimento           = (string) $parser->pDif;
    $std->icms_valor_diferido                   = (string) $parser->vICMSDif;
    $std->icms_valor                            = (string) $parser->vICMS;
    $std->fcp_base_calculo                      = (string) $parser->vBCFCP;
    $std->fcp_percentual                        = (string) $parser->pFCP;
    $std->fcp_valor                             = (string) $parser->vFCP;
  }

  private static function ICMS60($parser, $std): void
  {
    $parser = $parser->ICMS60;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
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

  private static function ICMS70($parser, $std): void
  {
    $parser = $parser->ICMS70;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_modalidade_base_calculo          = (int) $parser->modBC;
    $std->icms_reducao_base_calculo             = (string) $parser->pRedBC;
    $std->icms_base_calculo                     = (string) $parser->vBC;
    $std->icms_aliquota                         = (string) $parser->pICMS;
    $std->icms_valor                            = (string) $parser->vICMS;
    $std->fcp_base_calculo                      = (string) $parser->vBCFCP;
    $std->fcp_percentual                        = (string) $parser->pFCP;
    $std->fcp_valor                             = (string) $parser->vFCP;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->pICMSST;
    $std->icms_valor_st                         = (string) $parser->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->vFCPST;
    $std->icms_valor_desonerado                 = (string) $parser->vICMSDeson;
    $std->icms_motivo_desoneracao               = (int) $parser->motDesICMS;
  }

  private static function ICMS90($parser, $std): void
  {
    $parser = $parser->ICMS90;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_modalidade_base_calculo          = (int) $parser->modBC;
    $std->icms_base_calculo                     = (string) $parser->vBC;
    $std->icms_reducao_base_calculo             = (string) $parser->pRedBC;
    $std->icms_aliquota                         = (string) $parser->pICMS;
    $std->icms_valor                            = (string) $parser->vICMS;
    $std->fcp_base_calculo                      = (string) $parser->vBCFCP;
    $std->fcp_percentual                        = (string) $parser->pFCP;
    $std->fcp_valor                             = (string) $parser->vFCP;
    $std->icms_modalidade_base_calculo_st       = (string) $parser->modBCST;
    $std->icms_margem_valor_adicionado_st       = (string) $parser->pMVAST;
    $std->icms_reducao_base_calculo_st          = (string) $parser->pRedBCST;
    $std->icms_base_calculo_st                  = (string) $parser->vBCST;
    $std->icms_aliquota_st                      = (string) $parser->pICMSST;
    $std->icms_valor_st                         = (string) $parser->vICMSST;
    $std->fcp_base_calculo_st                   = (string) $parser->vBCFCPST;
    $std->fcp_percentual_st                     = (string) $parser->pFCPST;
    $std->fcp_valor_st                          = (string) $parser->vFCPST;
    $std->icms_valor_desonerado                 = (string) $parser->vICMSDeson;
    $std->icms_motivo_desoneracao               = (int) $parser->motDesICMS;
  }

  private static function ICMSPart($parser, $std): void
  {
    $parser = $parser->ICMSPart;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
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
    $std->icms_base_calculo_operacao_propria    = (string) $parser->pBCOp;
    $std->icms_uf_st                            = (string) $parser->UFST;
  }

  private static function ICMSST($parser, $std): void
  {
    $parser = $parser->ICMSST;

    $std->icms_origem                           = (int) $parser->orig;
    $std->icms_situacao_tributaria              = (int) $parser->CST;
    $std->icms_base_calculo_retido_remetente    = (string) $parser->vBCSTRet;
    $std->icms_aliquota_final                   = (string) $parser->pST;
    $std->icms_valor_substituto                 = (string) $parser->vICMSSubstituto;
    $std->icms_valor_retido_st                  = (string) $parser->vICMSSTRet;
    $std->fcp_base_calculo_retido_st            = (string) $parser->vBCFCPSTRet;
    $std->fcp_percentual_retido_st              = (string) $parser->pFCPSTRet;
    $std->fcp_valor_retido_st                   = (string) $parser->vFCPSTRet;
    $std->icms_base_calculo_destino             = (string) $parser->vBCSTDest;
    $std->icms_valor_destino                    = (string) $parser->vICMSSTDest;
    $std->icms_reducao_base_calculo_efetiva     = (string) $parser->pRedBCEfet;
    $std->icms_base_calculo_efetiva             = (string) $parser->vBCEfet;
    $std->icms_aliquota_efetiva                 = (string) $parser->pICMSEfet;
    $std->icms_valor_efetivo                    = (string) $parser->vICMSEfet;
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
