<?php

namespace HossamMonir\FourJawaly\Traits;

use Illuminate\Support\Facades\Http;

trait Processor
{
    /**
     * Send [SendMessage] Request to FourJawaly API.
     *
     * @return array
     */
    public function sendMessage(): array
    {
        return Http::baseUrl($this->baseUrl)
            ->withToken($this->config['Token'], 'Basic')
            ->asForm()
            ->post('/account/area/sms/send', $this->mapSendMessage())
            ->json();
    }

    /**
     * Send [GetBalance] Request to FourJawaly API.
     *
     * @return array
     */
    public function getBalance(): array
    {
        return Http::baseUrl($this->baseUrl)
            ->withToken($this->config['Token'], 'Basic')
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->get('/account/area/me/packages?', $this->mapBalanceQuery())
            ->json();
    }

}
