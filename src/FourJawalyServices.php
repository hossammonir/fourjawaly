<?php

namespace HossamMonir\FourJawaly;

use HossamMonir\FourJawaly\Services\GetBalance;
use HossamMonir\FourJawaly\Services\SendMessage;

class FourJawalyServices
{
    private string $senderID;

    private string $message;

    private array $numbers;
    private int $onlyActive = 1;

    /**
     * Set Sender ID
     *
     * @param  string|null  $senderId
     * @return $this
     */
    public function setSenderId(string $senderId = null): static
    {
        $this->senderID = $senderId;

        return $this;
    }

    /**
     * Set Message.
     *
     * @param  string  $message
     * @return $this
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set Recipient Mobile Number
     *
     * @param  array  $numbers
     * @return $this
     */
    public function setNumbers(array $numbers): static
    {
        $this->numbers = $numbers;

        return $this;
    }

    /**
     * Set Active Packages
     *
     * @param  int|null $onlyActive
     * @return $this
     */
    public function setOnlyActive(?int $onlyActive = 1): static
    {
        $this->onlyActive = $onlyActive;

        return $this;
    }

    /**
     * Sent SMS Message.
     *
     * @return array
     */
    public function send(): array
    {
        return ( new SendMessage() )
            ->setMessage($this->message)
            ->setNumbers($this->numbers)
            ->setSenderId($this->senderID)
            ->send();
    }

    /**
     * Get SMS Balance.
     *
     * @return array
     */

    public function balance(): array
    {
        return ( new GetBalance() )
            ->setOnlyActive($this->onlyActive)
            ->balance();
    }
}
