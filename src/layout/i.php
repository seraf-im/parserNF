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

class i
{
  public static function run(object $data, int $numero_item, $std = new stdClass): stdClass
  {
    $parser = $data->xpath("//NFe//det[@nItem = {$numero_item}]//prod")[0];

    $return = [];
    $i = 0;

    $std->codigo_produto                        = (string) $parser->cProd;
    $std->codigo_barras_comercial               = (string) $parser->cEAN;
    $std->descricao                             = (string) $parser->xProd;
    $std->codigo_ncm                            = (string) $parser->NCM;
    //NVE
    $std->cest                                  = (string) $parser->CEST;
    $std->escala_relevante                      = (string) $parser->indEscada;
    $std->cnpj_fabricante                       = (string) $parser->CNPJFab;
    $std->codigo_beneficio_fiscal               = (string) $parser->cBenef;
    $std->codigo_ex_tipi                        = (string) $parser->EXTIPI;
    $std->cfop                                  = (int) $parser->CFOP;
    $std->unidade_comercial                     = (string) $parser->uCom;
    $std->quantidade_comercial                  = (string) $parser->qCom;
    $std->valor_unitario_comercial              = (string) $parser->vUnCom;
    $std->valor_bruto                           = (string) $parser->vProd;
    $std->codigo_barras_tributavel              = (string) $parser->cEANTrib;
    $std->unidade_tributavel                    = (string) $parser->uTrib;
    $std->quantidade_tributavel                 = (string) $parser->qTrib;
    $std->valor_unitario_tributavel             = (string) $parser->vUnTrib;
    $std->valor_frete                           = (string) $parser->vFrete;
    $std->valor_seguro                          = (string) $parser->vSeg;
    $std->valor_desconto                        = (string) $parser->vDesc;
    $std->valor_outras_despesas                 = (string) $parser->vOutro;
    $std->inclui_no_total                       = (string) $parser->indTot;

    return $std;
  }
}
