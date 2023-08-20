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
##                                          INICIO CODIGO DE FONTE!                                          ##
###############################################################################################################

namespace Pnhs\ParserNF\Validators;

use Exception;
use Pnhs\ParserNF\Utils\Decimal;
use Pnhs\ParserNF\Utils\CNPJ;

class NFe
{
    private mixed $ide;
    private mixed $NFref;
    private mixed $emit;
    private mixed $dest;
    private mixed $retirada;
    private mixed $entrega;
    private mixed $autXML;
    private array $prod = [];
    private mixed $total;
    private mixed $transp;
    private mixed $cobr;
    private array $detPag = [];
    private mixed $infIntermed;
    private mixed $infAdic;
    private mixed $exporta;
    private mixed $compra;
    private mixed $cana;

    private Decimal $vProd;

    private string $vFrete = "0";
    private string $vSeg = "0";
    private string $vDesc = "0";
    private string $vOutro = "0";
    private string $vTroco = "0";

    private Decimal $ICMSTot_vBC;
    private Decimal $ICMSTot_vICMS;
    private Decimal $ICMSTot_vICMSDeson;
    private Decimal $ICMSTot_vFCPUFDest;
    private Decimal $ICMSTot_vICMSUFDest;
    private Decimal $ICMSTot_vICMSUFRemet;
    private Decimal $ICMSTot_vFCP;
    private Decimal $ICMSTot_vBCST;
    private Decimal $ICMSTot_vST;
    private Decimal $ICMSTot_vFCPST;
    private Decimal $ICMSTot_vFCPSTRet;
    private Decimal $ICMSTot_vProd;
    private Decimal $ICMSTot_vFrete;
    private Decimal $ICMSTot_vSeg;
    private Decimal $ICMSTot_vDesc;
    private Decimal $ICMSTot_vII;
    private Decimal $ICMSTot_vIPI;
    private Decimal $ICMSTot_vIPIDevol;
    private Decimal $ICMSTot_vPIS;
    private Decimal $ICMSTot_vCOFINS;
    private Decimal $ICMSTot_vOutro;
    private Decimal $ICMSTot_vNF;
    private Decimal $ICMSTot_vTotTrib;

    private Decimal $ISSQNtot_vServ;
    private Decimal $ISSQNtot_vBC;
    private Decimal $ISSQNtot_vISS;
    private Decimal $ISSQNtot_vPIS;
    private Decimal $ISSQNtot_vCOFINS;
    private ?string $ISSQNtot_dCompet = null;
    private Decimal $ISSQNtot_vDeducao;
    private Decimal $ISSQNtot_vOutro;
    private Decimal $ISSQNtot_vDescIncond;
    private Decimal $ISSQNtot_vDescCond;
    private Decimal $ISSQNtot_vISSRet;
    private ?string $ISSQNtot_cRegTrib = null;

    private Decimal $retTrib_vRetPIS;
    private Decimal $retTrib_vRetCOFINS;
    private Decimal $retTrib_vRetCSLL;
    private Decimal $retTrib_vBCIRRF;
    private Decimal $retTrib_vIRRF;
    private Decimal $retTrib_vBCRetPrev;
    private Decimal $retTrib_vRetPrev;

    public function __construct(private bool $strict = false)
    {
        $this->vProd = new Decimal("0", 2);
        $this->ICMSTot_vBC = new Decimal("0", 2);
        $this->ICMSTot_vICMS = new Decimal("0", 2);
        $this->ICMSTot_vICMSDeson = new Decimal("0", 2);
        $this->ICMSTot_vFCPUFDest = new Decimal("0", 2);
        $this->ICMSTot_vICMSUFDest = new Decimal("0", 2);
        $this->ICMSTot_vICMSUFRemet = new Decimal("0", 2);
        $this->ICMSTot_vFCP = new Decimal("0", 2);
        $this->ICMSTot_vBCST = new Decimal("0", 2);
        $this->ICMSTot_vST = new Decimal("0", 2);
        $this->ICMSTot_vFCPST = new Decimal("0", 2);
        $this->ICMSTot_vST = new Decimal("0", 2);
        $this->ICMSTot_vFCPST = new Decimal("0", 2);
        $this->ICMSTot_vFCPSTRet = new Decimal("0", 2);
        $this->ICMSTot_vProd = new Decimal("0", 2);
        $this->ICMSTot_vFrete = new Decimal("0", 2);
        $this->ICMSTot_vSeg = new Decimal("0", 2);
        $this->ICMSTot_vDesc = new Decimal("0", 2);
        $this->ICMSTot_vII = new Decimal("0", 2);
        $this->ICMSTot_vIPI = new Decimal("0", 2);
        $this->ICMSTot_vIPIDevol = new Decimal("0", 2);
        $this->ICMSTot_vPIS = new Decimal("0", 2);
        $this->ICMSTot_vCOFINS = new Decimal("0", 2);
        $this->ICMSTot_vOutro = new Decimal("0", 2);
        $this->ICMSTot_vNF = new Decimal("0", 2);
        $this->ICMSTot_vTotTrib = new Decimal("0", 2);
        $this->ISSQNtot_vServ = new Decimal("0", 2);
        $this->ISSQNtot_vBC = new Decimal("0", 2);
        $this->ISSQNtot_vISS = new Decimal("0", 2);
        $this->ISSQNtot_vPIS = new Decimal("0", 2);
        $this->ISSQNtot_vCOFINS = new Decimal("0", 2);
        $this->ISSQNtot_vDeducao = new Decimal("0", 2);
        $this->ISSQNtot_vOutro = new Decimal("0", 2);
        $this->ISSQNtot_vDescIncond = new Decimal("0", 2);
        $this->ISSQNtot_vDescCond = new Decimal("0", 2);
        $this->ISSQNtot_vISSRet = new Decimal("0", 2);
        $this->retTrib_vRetPIS = new Decimal("0", 2);
        $this->retTrib_vRetCOFINS = new Decimal("0", 2);
        $this->retTrib_vRetCSLL = new Decimal("0", 2);
        $this->retTrib_vBCIRRF = new Decimal("0", 2);
        $this->retTrib_vIRRF = new Decimal("0", 2);
        $this->retTrib_vBCRetPrev = new Decimal("0", 2);
        $this->retTrib_vRetPrev = new Decimal("0", 2);
    }

    /**
     * __get
    *
    * @param string $name
    * @return mixed
    */
    public function __get(string $name): mixed
    {
        $method = 'get' . ucfirst($name);
        if (method_exists(__CLASS__, $method)) {
            return $this->$method();
        }
        return $this->$name;
    }

    /**
     * __set
    *
    * @param string $name
    * @param mixed $value
    * @return void
    */
    public function __set(string $name, mixed $value): void
    {
        $method = 'set' . ucfirst($name);
        if (method_exists(__CLASS__, $method)) {
            $this->$method($value);
        } else {
            $this->$name = $value;
        }
        $this->calc();
    }

    public function result(): array
    {
        return ([
            "prod"                  => $this->prod,
            "total"                 => [
                "ICMSTot"           => [
                    "vBC"           => $this->ICMSTot_vBC->result(),
                    "vICMS"         => $this->ICMSTot_vICMS->result(),
                    "vICMSDeson"    => $this->ICMSTot_vICMSDeson->result(),
                    "vFCPUFDest"    => $this->ICMSTot_vFCPUFDest->result(),
                    "vICMSUFDest"   => $this->ICMSTot_vICMSUFDest->result(),
                    "vICMSUFRemet"  => $this->ICMSTot_vICMSUFRemet->result(),
                    "vFCP"          => $this->ICMSTot_vFCP->result(),
                    "vBCST"         => $this->ICMSTot_vBCST->result(),
                    "vST"           => $this->ICMSTot_vST->result(),
                    "vFCPST"        => $this->ICMSTot_vFCPST->result(),
                    "vFCPSTRet"     => $this->ICMSTot_vFCPSTRet->result(),
                    "vProd"         => $this->ICMSTot_vProd->result(),
                    "vFrete"        => $this->ICMSTot_vFrete->result(),
                    "vSeg"          => $this->ICMSTot_vSeg->result(),
                    "vDesc"         => $this->ICMSTot_vDesc->result(),
                    "vII"           => $this->ICMSTot_vII->result(),
                    "vIPI"          => $this->ICMSTot_vIPI->result(),
                    "vIPIDevol"     => $this->ICMSTot_vIPIDevol->result(),
                    "vPIS"          => $this->ICMSTot_vPIS->result(),
                    "vCOFINS"       => $this->ICMSTot_vCOFINS->result(),
                    "vOutro"        => $this->ICMSTot_vOutro->result(),
                    "vNF"           => $this->ICMSTot_vNF->result(),
                    "vTotTrib"      => $this->ICMSTot_vTotTrib->result()
                ],
                "ISSQNtot"          => [
                    "vServ"         => $this->ISSQNtot_vServ->result(),
                    "vBC"           => $this->ISSQNtot_vBC->result(),
                    "vISS"          => $this->ISSQNtot_vISS->result(),
                    "vPIS"          => $this->ISSQNtot_vPIS->result(),
                    "vCOFINS"       => $this->ISSQNtot_vCOFINS->result(),
                    "dCompet"       => $this->ISSQNtot_dCompet,
                    "vDeducao"      => $this->ISSQNtot_vDeducao->result(),
                    "vOutro"        => $this->ISSQNtot_vOutro->result(),
                    "vDescIncond"   => $this->ISSQNtot_vDescIncond->result(),
                    "vDescCond"     => $this->ISSQNtot_vDescCond->result(),
                    "vISSRet"       => $this->ISSQNtot_vISSRet->result(),
                    "cRegTrib"      => $this->ISSQNtot_cRegTrib
                ],
                "retTrib"           => [
                    "vRetPIS"       => $this->retTrib_vRetPIS->result(),
                    "vRetCOFINS"    => $this->retTrib_vRetCOFINS->result(),
                    "vRetCSLL"      => $this->retTrib_vRetCSLL->result(),
                    "vBCIRRF"       => $this->retTrib_vBCIRRF->result(),
                    "vIRRF"         => $this->retTrib_vIRRF->result(),
                    "vBCRetPrev"    => $this->retTrib_vBCRetPrev->result(),
                    "vRetPrev"      => $this->retTrib_vRetPrev->result()
                ]
            ],
            "detPag"    => $this->detPag,
            "vTroco"    => $this->vTroco
        ]);
    }

    public function addProd(
        Prod $prod,
        mixed $DI = null,
        mixed $detExport = null,
        ?string $xPed = null,
        ?int $nItemPed = null,
        ?string $nFCI = null,
        mixed $rastro = null,
        mixed $veicProd = null,
        mixed $med = null,
        mixed $arma = null,
        mixed $comb = null,
        mixed $nRECOPI = null,
        Icms $icms = null,
        mixed $icmsUfDest = null,
        mixed $ipi = null,
        mixed $ii = null,
        mixed $pis = null,
        mixed $pisSt = null,
        mixed $cofins = null,
        mixed $cofinsSt = null,
        mixed $issqn = null,
        mixed $impostoDevol = null,
        ?string $infAdProd = null
    ): void {
        $this->vProd->sum($prod->vProd);

        array_push($this->prod, [
            'cProd'                     => $prod->cProd,
            'cEAN'                      => $prod->cEAN,
            'xProd'                     => $prod->xProd,
            'NCM'                       => $prod->NCM,
            'NVE'                       => $prod->NVE,
            'CEST'                      => $prod->CEST,
            'indEscala'                 => $prod->indEscala,
            'CNPJFab'                   => $prod->CNPJFab,
            'cBenef'                    => $prod->cBenef,
            'EXTIPI'                    => $prod->EXTIPI,
            'CFOP'                      => $prod->CFOP,
            'uCom'                      => $prod->uCom,
            'qCom'                      => $prod->qCom,
            'vUnCom'                    => $prod->vUnCom,
            'vProd'                     => $prod->vProd,
            'cEANTrib'                  => $prod->cEANTrib,
            'uTrib'                     => $prod->uTrib,
            'qTrib'                     => $prod->qTrib,
            'vUnTrib'                   => $prod->vUnTrib,
            'vFrete'                    => $prod->vFrete,
            'vSeg'                      => $prod->vSeg,
            'vDesc'                     => $prod->vDesc,
            'vOutro'                    => $prod->vOutro,
            'indTot'                    => $prod->indTot,
            'DI'                        => null,
            'detExport'                 => null,
            'xPed'                      => $xPed,
            'nItemPed'                  => $nItemPed,
            'nFCI'                      => $nFCI,
            'rastro'                    => null,
            'veicProd'                  => null,
            'med'                       => null,
            'arma'                      => null,
            'comb'                      => null,
            'nRECOPI'                   => $nRECOPI,
            'imposto'                   => [
                'vTotTrib'              => null,
                'ICMS'                  => [
                    'orig'              => $icms->orig,
                    'CST'               => $icms->CST,
                    'modBC'             => $icms->modBC,
                    'pRedBC'            => $icms->pRedBC,
                    'vBC'               => $icms->vBC,
                    'pICMS'             => $icms->pICMS,
                    'vICMSOp'           => $icms->vICMSOp,
                    'pDif'              => $icms->pDif,
                    'vICMSDif'          => $icms->vICMSDif,
                    'vICMS'             => $icms->vICMS,
                    'vBCFCP'            => $icms->vBCFCP,
                    'pFCP'              => $icms->pFCP,
                    'vFCP'              => $icms->vFCP,
                    'modBCST'           => $icms->modBCST,
                    'pMVAST'            => $icms->pMVAST,
                    'pRedBCST'          => $icms->pRedBCST,
                    'vBCST'             => $icms->vBCST,
                    'pICMSST'           => $icms->pICMSST,
                    'vICMSST'           => $icms->vICMSST,
                    'vBCFCPST'          => $icms->vBCFCPST,
                    'pFCPST'            => $icms->pFCPST,
                    'vFCPST'            => $icms->vFCPST,
                    'UFST'              => $icms->UFST,
                    'pBCOp'             => $icms->pBCOp,
                    'vBCSTRet'          => $icms->vBCSTRet,
                    'pST'               => $icms->pST,
                    'vICMSSubstituto'   => $icms->vICMSSubstituto,
                    'vICMSSTRet'        => $icms->vICMSSTRet,
                    'vBCFCPSTRet'       => $icms->vBCFCPSTRet,
                    'pFCPSTRet'         => $icms->pFCPSTRet,
                    'vFCPSTRet'         => $icms->vFCPSTRet,
                    'vICMSDeson'        => $icms->vICMSDeson,
                    'motDesICMS'        => $icms->motDesICMS,
                    'pCredSN'           => $icms->pCredSN,
                    'vCredICMSSN'       => $icms->vCredICMSSN,
                    'vBCSTDest'         => $icms->vBCSTDest,
                    'vICMSSTDest'       => $icms->vICMSSTDest,
                    'pRedBCEfet'        => $icms->pRedBCEfet,
                    'vBCEfet'           => $icms->vBCEfet,
                    'pICMSEfet'         => $icms->pICMSEfet,
                    'vICMSEfet'         => $icms->vICMSEfet
                ],
                "impostoDevol"          => [
                    "pDevol"            => null,
                    "vIPIDevol"         => null
                ],
                "infAdProd"             => $infAdProd
            ]
        ]);

        //ICMSTot_vBC
        $this->ICMSTot_vBC->sum($icms->vBC);

        //ICMSTot_vICMS
        if (!($icms->CST == '40' || $icms->CST == '41' || $icms->CST == '50')) {
            $this->ICMSTot_vICMS->sum($icms->vICMS);
        }

        //ICMSTot_vICMSDeson
        $this->ICMSTot_vICMSDeson->sum($icms->vICMSDeson);

        // //ICMSTot_vFCPUFDest
        // $this->ICMSTot_vICMSDeson->sum($icms->ICMSTot_vICMSDeson);

        // //ICMSTot_vICMSUFDest
        // $this->ICMSTot_vICMSDeson->sum($icms->ICMSTot_vICMSDeson);

        // //ICMSTot_vICMSUFRemet
        // $this->ICMSTot_vICMSDeson->sum($icms->ICMSTot_vICMSDeson);

        //ICMSTot_vFCP
        $this->ICMSTot_vFCP->sum($icms->vFCP);

        //ICMSTot_vBCST
        $this->ICMSTot_vBCST->sum($icms->vBCST);

        // //ICMSTot_vST
        // $this->ICMSTot_vST->sum($icms->vST);

        //ICMSTot_vFCPST
        $this->ICMSTot_vFCPST->sum($icms->vFCPST);

        //ICMSTot_vFCPSTRet
        $this->ICMSTot_vFCPSTRet->sum($icms->vFCPSTRet);

        //ICMSTot_vProd
        if ($prod->indTot) {
            $this->ICMSTot_vProd->sum($prod->vProd);
        }

        //ICMSTot_vFrete
        $this->ICMSTot_vFrete->sum($prod->vFrete);

        //ICMSTot_vSeg
        $this->ICMSTot_vSeg->sum($prod->vSeg);

        //ICMSTot_vDesc
        $this->ICMSTot_vDesc->sum($prod->vDesc);

        // // //ICMSTot_vII
        // // //ICMSTot_vIPI
        // // //ICMSTot_vIPIDevol
        // // //ICMSTot_vPIS
        // // //ICMSTot_vCOFINS

        //ICMSTot_vOutro
        $this->ICMSTot_vOutro->sum($prod->vOutro);

        //ICMSTot_vNF
        $this->ICMSTot_vNF
        ->sum($prod->vProd)
        ->sub($prod->vDesc)
        ->sub($icms->vICMSDeson)
        ->sum($icms->vBCST)
        ->sum($prod->vFrete)
        ->sum($prod->vSeg)
        ->sum($prod->vOutro);
        //+ valor_total_ii + valor_ipi + valor_total_servicos

        // // //ICMSTot_vTotTrib
        // // //ISSQNtot_vServ
        // // //ISSQNtot_vBC
        // // //ISSQNtot_vISS
        // // //ISSQNtot_vPIS
        // // //ISSQNtot_vCOFINS
        // // //ISSQNtot_dCompet
        // // //ISSQNtot_vDeducao
        // // //ISSQNtot_vOutro
        // // //ISSQNtot_vDescIncond
        // // //ISSQNtot_vDescCond
        // // //ISSQNtot_vISSRet
        // // //ISSQNtot_cRegTrib
        // // //retTrib_vRetPIS
        // // //retTrib_vRetCOFINS
        // // //retTrib_vRetCSLL
        // // //retTrib_vBCIRRF
        // // //retTrib_vIRRF
        // // //retTrib_vBCRetPrev
        // // //retTrib_vRetPrev

        // vNF = valor_produtos – valor_desconto – icms_valor_total_desonerado + icms_valor_total_st
        // + valor_frete + valor_seguro + valor_outras_despesas + valor_total_ii + valor_ipi + valor_total_servicos

        $this->calc();
    }

    private function setDetPag(DetPag $detPag): void
    {
        array_push($this->detPag, [
            'indPag'    => $detPag->indPag,
            'tPag'      => $detPag->tPag,
            'vPag'      => $detPag->vPag,
            'tpIntegra' => $detPag->tpIntegra,
            'CNPJ'      => $detPag->CNPJ,
            'tBand'     => $detPag->tBand,
            'cAut'      => $detPag->cAut,
        ]);
    }

    private function calc(): void
    {
        $vTroco = new Decimal("0", 2);

        $count = count($this->prod);

        if ($this->vFrete) {
            $vFreteRest = new Decimal($this->vFrete, 2);
            foreach ($this->prod as $key => $prod) {
                $vFrete = new Decimal("0", 2);
                $mul = $vFrete->sum($prod['vProd'] ?? '0')->mul($this->vFrete);
                $mul->div($this->vProd->result());
                $this->prod[$key]['vFrete'] = $mul->result();
                $vFreteRest->sub($mul->result());
            }
            if ($vFreteRest->result() !== "0.00") {
                $this->prod[$count - 1]['vFrete'] = (new Decimal($this->prod[$count - 1]['vFrete'], 2))
                ->sum($vFreteRest->result())->result();
            }
        }

        if ($this->vSeg) {
            $vSegRest = new Decimal($this->vSeg, 2);
            foreach ($this->prod as $key => $prod) {
                $vSeg = new Decimal("0", 2);
                $mul = $vSeg->sum($prod['vProd'] ?? '0')->mul($this->vSeg);
                $mul->div($this->vProd->result());
                $this->prod[$key]['vSeg'] = $mul->result();
                $vSegRest->sub($mul->result());
            }
            if ($vSegRest->result() !== "0.00") {
                $this->prod[$count - 1]['vSeg'] = (new Decimal($this->prod[$count - 1]['vSeg'], 2))
                ->sum($vSegRest->result())->result();
            }
        }

        if ($this->vDesc) {
            $vDescRest = new Decimal($this->vDesc, 2);
            foreach ($this->prod as $key => $prod) {
                $vDesc = new Decimal("0", 2);
                $mul = $vDesc->sum($prod['vProd'] ?? '0')->mul($this->vDesc);
                $mul->div($this->vProd->result());
                $this->prod[$key]['vDesc'] = $mul->result();
                $vDescRest->sub($mul->result());
            }
            if ($vDescRest->result() !== "0.00") {
                $this->prod[$count - 1]['vDesc'] = (new Decimal($this->prod[$count - 1]['vDesc'], 2))
                ->sum($vDescRest->result())->result();
            }
        }

        if ($this->vOutro) {
            $vOutroRest = new Decimal($this->vOutro, 2);
            foreach ($this->prod as $key => $prod) {
                $vOutro = new Decimal("0", 2);
                $mul = $vOutro->sum($prod['vProd'] ?? '0')->mul($this->vOutro);
                $mul->div($this->vProd->result());
                $this->prod[$key]['vOutro'] = $mul->result();
                $vOutroRest->sub($mul->result());
            }
            if ($vOutroRest->result() !== "0.00") {
                $this->prod[$count - 1]['vOutro'] = (new Decimal($this->prod[$count - 1]['vOutro'], 2))
                ->sum($vOutroRest->result())->result();
            }
        }

        foreach ($this->prod as $prod) {
            $vTroco
            ->sub($prod['vProd'])
            ->sub($prod['vFrete'])
            ->sub($prod['vSeg'])
            ->sum($prod['vDesc'])
            ->sub($prod['vOutro']);
        }

        foreach ($this->detPag as $detPag) {
            $vTroco
            ->sum($detPag['vPag']);
        }

        $this->vTroco = $vTroco->result();
    }

    private function setProd(): void
    {
    }

    private function setVTroco(): void
    {
    }
}
