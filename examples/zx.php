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

use Pnhs\ParserNF\layout\zx;
use Pnhs\ParserNF\Parser;

require "../autoload.php";

try {
  if (!file_exists("nota_fiscal.xml")) die("Arquivo nota_fiscal.xml não existe");
  $xml = file_get_contents("nota_fiscal.xml");

  $parser = new parser($xml);
  $p = $parser->read();

  $group_zx = zx::run($p);

  if (is_null($group_zx)) die('Nota Fiscal Inválida');

  echo '<p class="display-5">Grupo ZX</p><p class="h5">Informações Suplementares da Nota Fiscal</p><pre>';
  print_r($group_zx);
  echo '</pre>';
} catch (Exception $e) {
  die("<b>Erro:</b> " . $e->getMessage());
}