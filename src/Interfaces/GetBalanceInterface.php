<?php

namespace HossamMonir\FourJawaly\Interfaces;

interface GetBalanceInterface
{
    public function setOnlyActive(?int $onlyActive = 1): static;

    public function balance();
}
