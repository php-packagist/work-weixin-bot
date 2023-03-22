<?php

namespace PhpPackagist\WorkWeixinBot;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use PhpPackagist\WorkWeixinBot\Messages\Message;

class Bot
{
    /**
     * @var string
     */
    public const API_SEND = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=%s';

    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var array|string[] config
     */
    protected array $config = [
        'key' => '',
    ];

    /**
     * @param array            $config
     * @param ?ClientInterface $client
     */
    public function __construct(array $config = [], ?ClientInterface $client = null)
    {
        $this->config = array_merge($this->config, $config);
        $this->client = $client ?? new Client();
    }

    public function send(Message $message): Response
    {
        $url = sprintf(self::API_SEND, $this->config['key']);
        $response = $this->client->request('POST', $url, [
            'json' => $message->toArray(),
        ]);
        return new Response($response);
    }
}
