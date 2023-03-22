<?php

namespace PhpPackagist\WorkWeixinBot;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use PhpPackagist\WorkWeixinBot\Messages\MessageInterface;
use PhpPackagist\WorkWeixinBot\Messages\Text;

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
     * @param array            $config
     * @param ?ClientInterface $client
     */
    public function __construct(array $config = [], ?ClientInterface $client = null)
    {
        $this->config = array_merge($this->config, $config);
        $this->client = $client ?? new Client();
    }

    /**
     * Send message.
     *
     * @param MessageInterface $message
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function send(MessageInterface $message): Response
    {
        $response = $this->client->request('POST',
            sprintf(self::API_SEND, $this->config['key']), [
            RequestOptions::JSON => $message->toArray(),
        ]);

        return new Response($response);
    }

    /**
     * Send Text Message.
     *
     * @param string $content
     * @param array  $mentioned_list
     * @param array  $mentioned_mobile_list
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendText(string $content, array $mentioned_list = [], array $mentioned_mobile_list = []): Response
    {
        return $this->send(new Text($content, $mentioned_list, $mentioned_mobile_list));
    }

    /**
     * Upload file.
     *
     * @param string $file_path
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function upload(string $file_path): Response
    {
        $response = $this->client->request('POST',
            sprintf(self::API_UPLOAD, $this->config['key']), [
            RequestOptions::MULTIPART => [
                [
                    'name'     => 'media',
                    'contents' => fopen($file_path, 'r'),
                ],
            ],
        ]);

        return new Response($response);
    }
}
