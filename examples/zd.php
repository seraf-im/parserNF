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

use Pnhs\ParserNF\layout\zd;
use Pnhs\ParserNF\Parser;

require "../autoload.php";

try {
  if (!file_exists("nota_fiscal.xml")) die("Arquivo nota_fiscal.xml não existe");
  $xml = file_get_contents("nota_fiscal.xml");

  $parser = new parser($xml);
  $p = $parser->read();

  $group_zd = zd::run($p);

  if (is_null($group_zd)) die('Nota Fiscal Inválida');

  echo '<p class="display-5">Grupo ZD</p><p class="h5">Informações do Responsável Técnico</p><pre>';
  print_r($group_zd);
  echo '</pre>';
} catch (Exception $e) {
  die("<b>Erro:</b> " . $e->getMessage());
}
