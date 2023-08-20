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

namespace Pnhs\ParserNF\Utils;

use Decimal\Decimal as DD;

class Decimal
{
    private DD $value;

    public function __construct(string $value, private int $dec, private $separator = '.')
    {
        $this->value = new DD($value);
        return $this;
    }

    public function sum(string $value): Decimal
    {
        $value = new DD(str_replace($this->separator, '.', $value));
        $this->value = $this->value + $value;
        return $this;
    }

    public function sub(string $value): Decimal
    {
        $value = new DD(str_replace($this->separator, '.', $value));
        $this->value = $this->value - $value;
        return $this;
    }

    public function mul(string $value): Decimal
    {
        $value = new DD(str_replace($this->separator, '.', $value));
        $this->value = $this->value * $value;
        return $this;
    }

    public function div(string $value): Decimal
    {
        $value = new DD(str_replace($this->separator, '.', $value));
        $this->value = $this->value / $value;
        return $this;
    }

    public function isPositive(): bool
    {
        return $this->value->isPositive();
    }

    public function isNegative(): bool
    {
        return $this->value->isNegative();
    }

    public function isZero(): bool
    {
        return $this->value->isZero();
    }

    public function negate(): Decimal
    {
        $this->value->negate();
        return $this;
    }

    public function result(): string
    {
        return $this->value->toFixed($this->dec);
    }

    public function formatted(): string
    {
        $value = $this->value->toFixed($this->dec);
        return str_replace('.', $this->separator, $value);
    }
}
