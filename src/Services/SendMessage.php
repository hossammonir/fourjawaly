<?php

namespace HossamMonir\FourJawaly\Services;

use HossamMonir\FourJawaly\Concerns\FourJawaly;
use HossamMonir\FourJawaly\Interfaces\SendMessageInterface;
use HossamMonir\FourJawaly\Traits\Processor;

class SendMessage extends FourJawaly implements SendMessageInterface
{
    use Processor;

    public function __construct(array $config = null)
    {
        // Call parent constructor to initialize common settings
        parent::__construct($config);
    }

    /**
     * Set Sender ID
     *
     * @param  string|null  $senderId
     * @return $this
     */
    public function setSenderId(string $senderId = null): static
    {
        $this->config['SenderID'] = $senderId;

        return $this;
    }

    /**
     * Set Message Body
     *
     * @param  string  $message
     * @return $this
     */
    public function setMessage(string $message): static
    {
        $this->config['Message'] = $message;

        return $this;
    }

    /**
     * Set Recipients Mobile Number
     *
     * @param  array  $numbers
     * @return $this
     */
    public function setNumbers(array $numbers): static
    {
        $this->config['Numbers'] = $numbers;

        return $this;
    }

    /**
     * Process the request.
     *
     * @return array
     */
    public function send(): array
    {
        return $this->SendMessage();
    }
}
