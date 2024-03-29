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

namespace Pnhs\ParserNF\enums;

enum VeicProdTpComb: string
{
  case ALCOOL = "01";
  case GASOLINA = "02";
  case DIESEL = "03";
  case GASOGENIO = "04";
  case GAS_METANO = "05";
  case ELETRICO_FONTE_INTERNA = "06";
  case ELETRICO_FONTE_EXTERNA = "07";
  case GASOLINA_GAS_NATURAL_COMBUSTIVEL = "08";
  case ALCOOL_GAS_NATURAL_COMBUSTIVEL = "09";
  case DIESEL_GAS_NATURAL_COMBUSTIVEL = "10";
  case VIDE_CAMPO_OBSERVACAO = "11";
  case ALCOOL_GAS_NATURAL_VEICULAR = "12";
  case GASOLINA_GAS_NATURAL_VEICULAR = "13";
  case DIESEL_GAS_NATURAL_VEICULAR = "14";
  case GAS_NATURAL_VEICULAR = "15";
  case ALCOOL_GASOLINA = "16";
  case GASOLINA_ALCOOL_GAS_NATURAL_VEICULAR = "17";
  case GASOLINA_ELETRICO = "18";
}
