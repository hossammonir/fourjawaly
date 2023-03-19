<?php

namespace HossamMonir\FourJawaly\Interfaces;

interface SendMessageInterface
{
    public function setSenderId(string $senderId = null): static;

    public function setMessage(string $message): static;

    public function setNumbers(array $numbers): static;

    public function send();
}
