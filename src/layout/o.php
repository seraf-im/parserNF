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

// class o
// {
//   public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
//   {
//     $parser = $data->NFe->infNFe->det->imposto[$numero_item - 1]->IPI;

//     $std->icms_base_calculo_uf_destino          = (string) $parser->vBCUFDest;
//     $std->fcp_base_calculo_uf_destino           = (string) $parser->vBCFCPUFDest;
//     $std->fcp_percentual_uf_destino             = (string) $parser->pFCPUFDest;
//     $std->icms_aliquota_interestadual           = (string) $parser->pICMSInter;
//     $std->icms_percentual_partilha              = (string) $parser->pICMSInterPart;
//     $std->fcp_valor_uf_destino                  = (string) $parser->vFCPUFDest;
//     $std->icms_valor_uf_destino                 = (string) $parser->vICMSUFDest;
//     $std->icms_valor_uf_remetente               = (string) $parser->vICMSUFDest;

//     ipi_cnpj_produtor CNPJProd
//     ipi_codigo_selo_controle cSelo
//     ipi_quantidade_selo_controle qSelo
//     ipi_codigo_enquadramento_legal cEnq


//     return $std;
//   }
// }
