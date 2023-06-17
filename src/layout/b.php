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

class b extends layout
{
  public static function run(object $data): stdClass
  {
    if (!$data) return null;
    $parser = $data->NFe->infNFe->ide;
    $std = new stdClass;

    $std->cUF         = Uf::from((int) self::tag((string) $parser->cUF, 'cUF não informado', 'B02', 1));
    $std->cNF         = self::tag((string) $parser->cNF, 'cNF não informado', 'B03', 1);
    $std->natOp       = self::tag((string) $parser->natOp, 'natOp não informado', 'B04', 1);
    $std->mod         = Mod::from(self::tag((string) $parser->mod, '', 'B06', 1));
    $std->serie       = self::tag((string) $parser->serie, 'serie não informado', 'B07', 1);
    $std->nNF         = self::tag((string) $parser->nNF, 'nNF não informado', 'B08', 1);
    $std->dhEmi       = self::tag((string) $parser->dhEmi, 'dhEmi não informado', 'B09', 1);
    $std->dhSaiEnt    = self::tag((string) $parser->dhSaiEnt, '', 'B10', 0);
    $std->tpNF        = TpNF::from((int)self::tag((string)$parser->tpNF, 'tpNF não informado', 'B11', 1));
    $std->idDest      = IdDest::from((int)self::tag((string)$parser->idDest, 'idDest não informado', 'B11a', 1));
    $std->cMunFG      = self::tag((string) $parser->cMunFG, 'cMunFG não informado', 'B12', 1);
    $std->tpImp       = TpImp::from((int)self::tag((string) $parser->tpImp, 'tpImp não informado', 'B21', 1));
    $std->tpEmis      = TpEmis::from((int)self::tag((string) $parser->tpEmis, 'tpEmis não informado', 'B22', 1));
    $std->cDV         = self::tag((string) $parser->cDV, 'cDV não informado', 'B23', 1);
    $std->tpAmb       = TpAmb::from((int)self::tag((string)$parser->tpAmb, 'tpAmb não informado', 'B24', 1));
    $std->finNFe      = FinNFe::from((int)self::tag((string)$parser->finNFe, 'finNFe não informado', 'B25', 1));
    $std->indFinal    = IndFinal::from((int)self::tag((string)$parser->indFinal, 'indFinal não informado', 'B25a', 1));
    $std->indPres     = IndPres::from((int)self::tag((string)$parser->indPres, 'IndPres não informado', 'B25b', 1));
    $std->indIntermed = IndIntermed::from((int)self::tag((string)$parser->indIntermed, '', 'B25c', 0));
    $std->procEmi     = ProcEmi::from((int)self::tag((string)$parser->procEmi, 'procEmi não informado', 'B26', 0));
    $std->verProc     = self::tag((string) $parser->verProc, 'verProc não informado', 'B27', 1);
    if ($parser->dhCont || $parser->xJust) {
      $std->dhCont    = self::tag((string) $parser->dhCont, '', 'B28', 1);
      $std->xJust     = self::tag((string) $parser->xJust, 'xJust não informado', 'B29', 1);
    }

    return $std;
  }
}
