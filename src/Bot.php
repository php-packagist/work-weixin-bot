<?php

namespace PhpPackagist\WorkWeixinBot;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

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

    /**
     * send text message.
     *
     * @param string $content
     * @param array  $mentionedMobileList
     * @param array  $mentionedUseridList
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendText(string $content, array $mentionedMobileList = [], array $mentionedUseridList = []): Response
    {
        $data = [
            'msgtype' => 'text',
            'text'    => [
                'content'               => $content,
                'mentioned_mobile_list' => $mentionedMobileList,
                'mentioned_userid_list' => $mentionedUseridList,
            ],
        ];

        return $this->sendRaw($data);
    }

    /**
     * send markdown message.
     *
     * @param string $content
     * @param array  $mentionedMobileList
     * @param array  $mentionedUseridList
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendMarkdown(string $content, array $mentionedMobileList = [], array $mentionedUseridList = []): Response
    {
        $data = [
            'msgtype'  => 'markdown',
            'markdown' => [
                'content'               => $content,
                'mentioned_mobile_list' => $mentionedMobileList,
                'mentioned_userid_list' => $mentionedUseridList,
            ],
        ];

        return $this->sendRaw($data);
    }

    /**
     * send image message.
     *
     * @param string $base64
     * @param string $md5
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendImage(string $base64, string $md5): Response
    {
        $data = [
            'msgtype' => 'image',
            'image'   => [
                'base64' => $base64,
                'md5'    => $md5,
            ],
        ];

        return $this->sendRaw($data);
    }

    /**
     * @param array $articles
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendNews(array $articles): Response
    {
        $data = [
            'msgtype' => 'news',
            'news'    => [
                'articles' => $articles,
            ],
        ];

        return $this->sendRaw($data);
    }

    /**
     * send raw message.
     *
     * @param array $params
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendRaw(array $params = []): Response
    {
        $url = sprintf(self::API_SEND, $this->config['key']);

        $response = $this->client->request('POST', $url, [
            'json' => $params,
        ]);

        return new Response($response);
    }
}
