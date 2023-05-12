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
    $parser = $data->NFe->infNFe->ide;
    $std = new stdClass;

    $std->cUF         = Uf::from((int) self::tag((string) $parser->cUF, 'cUF não informado', 0, 1));
    $std->cNF         = self::tag((string) $parser->cNF, 'cNF não informado', 0, 1);
    $std->natOp       = self::tag((string) $parser->natOp, 'natOp não informado', 0, 1);
    $std->mod         = Mod::from(self::tag((string) $parser->mod, '', 0, 1));
    $std->serie       = self::tag((string) $parser->serie, 'serie não informado', 0, 1);
    $std->nNF         = self::tag((string) $parser->nNF, 'nNF não informado', 0, 1);
    $std->dhEmi       = self::tag((string) $parser->dhEmi, '', 0, 1);
    $std->dhSaiEnt    = self::tag((string) $parser->dhSaiEnt, '', 0, 0);
    $std->tpNF        = TpNF::from((int)self::tag((string)$parser->tpNF, '', 0, 1));
    $std->idDest      = IdDest::from((int)self::tag((string)$parser->idDest, '', 0, 1));
    $std->cMunFG      = self::tag((string) $parser->cMunFG, 'cMunFG não informado', 0, 1);
    $std->tpImp       = TpImp::from((int)self::tag((string) $parser->tpImp, '', 0, 1));
    $std->tpEmis      = TpEmis::from((int)self::tag((string) $parser->tpEmis, '', 0, 1));
    $std->cDV         = self::tag((string) $parser->cDV, 'cDV não informado', 0, 1);
    $std->tpAmb       = TpAmb::from((int)self::tag((string)$parser->tpAmb, 'tpAmb não informado', 0, 1));
    $std->finNFe      = FinNFe::from((int)self::tag((string)$parser->finNFe, 'finNFe não informado', 0, 1));
    $std->indFinal    = IndFinal::from((int)self::tag((string)$parser->indFinal, 'indFinal não informado', 0, 1));
    $std->indPres     = IndPres::from((int)self::tag((string)$parser->indPres, 'IndPres não informado', 0, 1));
    $std->indIntermed = IndIntermed::from((int)self::tag((string)$parser->indIntermed, 'indIntermed não informado', 0, 0));
    $std->procEmi     = ProcEmi::from((int)self::tag((string)$parser->procEmi, 'procEmi não informado', 0, 0));
    $std->verProc     = self::tag((string) $parser->verProc, 'verProc não informado', 0, 1);
    $std->dhCont      = self::tag((string) $parser->dhCont, '', 0, 0);
    $std->xJust       = self::tag((string) $parser->xJust, 'xJust não informado', 0, 0);

    return $std;
  }
}
