<?php

namespace HossamMonir\FourJawaly\Facades;

use HossamMonir\FourJawaly\FourJawalyServices;
use Illuminate\Support\Facades\Facade;

/**
 * Class Unifonic
 *
 * @mixin \HossamMonir\FourJawaly\FourJawalyServices
 */
class FourJawaly extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return FourJawalyServices::class;
    }
}
