<?php

namespace HossamMonir\FourJawaly\Services;

use HossamMonir\FourJawaly\Concerns\FourJawaly;
use HossamMonir\FourJawaly\Interfaces\GetBalanceInterface;
use HossamMonir\FourJawaly\Interfaces\SendMessageInterface;
use HossamMonir\FourJawaly\Traits\Processor;

class GetBalance extends FourJawaly implements GetBalanceInterface
{
    use Processor;

    public function __construct(array $config = null)
    {
        // Call parent constructor to initialize common settings
        parent::__construct($config);
    }

    /**
     * Get Only Active Packages
     *
     * @param  int|null  $onlyActive
     * @return $this
     */
    public function setOnlyActive(?int $onlyActive = 1): static
    {
        $this->config['OnlyActive'] = $onlyActive;

        return $this;
    }


    /**
     * Process the request.
     *
     * @return array
     */
    public function balance(): array
    {
        return $this->getBalance();
    }
}
