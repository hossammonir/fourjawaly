<?php

namespace HossamMonir\FourJawaly\Concerns;

use Exception;
use Throwable;

abstract class FourJawaly
{
    protected array $config;

    protected string $baseUrl;

    /**
     * @throws Throwable
     */
    public function __construct($config = null)
    {
        $this->init($config);
    }

    /**
     * @throws Throwable
     */
    protected function init(array $config = null): void
    {
        $this->baseUrl = 'https://api-sms.4jawaly.com/api/v1';

        throw_if(
            ! config('fourjawaly.app_id') || ! config('fourjawaly.app_secret'),
            new Exception('Four Jawaly AppId and AppSecret are required')
        );

        // set default Configurations
        $config['SenderID'] = $config['SenderID'] ?? config('fourjawaly.sender_id');
        $config['Token'] = $this->token();

        // Set optionals Configurations
        $this->config = $config;
    }

    /**
     * Generate Token
     *
     * @return string
     */
    private function token(): string
    {
        $AppId = config('fourjawaly.app_id');
        $AppSecret = config('fourjawaly.app_secret');
        return base64_encode("$AppId:$AppSecret");
    }

    public function mapSendMessage(): array
    {
        return [
            'messages' => [
                [
                    'sender' => $this->config['SenderID'],
                    'text' => $this->config['Message'],
                    'numbers' => $this->config['Numbers'],
                ],
            ],
        ];
    }

    public function mapBalanceQuery(): array
    {
        return [
            'order_by' => 'id',
            'order_by_type' => 'desc',
            'page' => 1,
            'page_size' => 10,
            'return_collection' => 1,
            'is_active' => $this->config['OnlyActive'],
        ];
    }
}
