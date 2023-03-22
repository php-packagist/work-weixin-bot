<?php

namespace PhpPackagist\WorkWeixinBot;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\ClientInterface;
use PhpPackagist\WorkWeixinBot\Messages\Message;

class Bot
{
    /**
     * @var string
     */
    public const API_SEND = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=%s';

    /**
     * @var string
     */
    public const API_UPLOAD = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/upload_media?key=%s&type=file';

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
     * @param  array            $config
     * @param ?ClientInterface  $client
     */
    public function __construct(array $config = [], ?ClientInterface $client = null)
    {
        $this->config = array_merge($this->config, $config);
        $this->client = $client ?? new Client();
    }

    // send message
    public function send(Message $message): Response
    {
        $url = sprintf(self::API_SEND, $this->config['key']);
        $response = $this->client->request('POST', $url, [
            RequestOptions::JSON => $message->toArray(),
        ]);
        return new Response($response);
    }

    // upload file
    public function upload(string $file_path): Response
    {
        $url = sprintf(self::API_UPLOAD, $this->config['key']);
        $response = $this->client->request('POST', $url, [
            RequestOptions::MULTIPART => [
                [
                    'name'=>'media',
                    'contents'=> fopen($file_path, 'r'),
                ]
            ],
        ]);
        return new Response($response);
    }
}
