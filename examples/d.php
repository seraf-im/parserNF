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

ini_set("display_errors", "On");
ini_set("display_startup_erros", "On");
error_reporting(E_ALL);

use Pnhs\ParserNF\layout\d;
use Pnhs\ParserNF\Parser;

require "../autoload.php";

try {
  if (!file_exists("nota_fiscal.xml")) die("Arquivo nota_fiscal.xml não existe");
  $xml = file_get_contents("nota_fiscal.xml");

  $parser = new parser($xml);
  $p = $parser->read();

  $group_d = d::run($p);

  if (is_null($group_d)) die('Nota Fiscal Inválida');

  echo '<p class="display-5">Grupo D</p><p class="h5">Identificação do Fisco Emitente da NF-e</p><pre>';
  print_r($group_d);
  echo '</pre>';
} catch (Exception $e) {
  die("<b>Erro:</b> " . $e->getMessage());
}
