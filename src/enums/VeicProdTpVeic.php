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

enum VeicProdTpVeic: string
{
  case CICLOMOTOR = "02";
  case MOTONETA = "03";
  case MOTOCICLETA = "04";
  case TRICICLO = "05";
  case AUTOMOVEL = "06";
  case MICRO_ONIBUS = "07";
  case ONIBUS = "08";
  case REBOQUE = "10";
  case SEMIRREBOQUE = "11";
  case CAMIONETA = "13";
  case CAMINHAO = "14";
  case CAMINHAO_TRATOR = "17";
  case TR_RODAS = "18";
  case TR_ESTEIRAS = "19";
  case TR_MISTO = "20";
  case QUADRICICLO = "21";
  case CHASSI_PLATAFORMA = "22";
  case CAMINHONETE = "23";
  case UTILITARIO = "25";
  case MOTOR_CASA = "26";
};
