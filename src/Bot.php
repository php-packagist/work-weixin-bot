<?php

namespace PhpPackagist\WorkWeixinBot;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use PhpPackagist\WorkWeixinBot\Contracts\MessageInterface;
use PhpPackagist\WorkWeixinBot\Messages\File;
use PhpPackagist\WorkWeixinBot\Messages\Image;
use PhpPackagist\WorkWeixinBot\Messages\Markdown;
use PhpPackagist\WorkWeixinBot\Messages\News;
use PhpPackagist\WorkWeixinBot\Messages\News\Article;
use PhpPackagist\WorkWeixinBot\Messages\NewsNotice;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction;
use PhpPackagist\WorkWeixinBot\Messages\Notice\CardImage;
use PhpPackagist\WorkWeixinBot\Messages\Notice\EmphasisContent;
use PhpPackagist\WorkWeixinBot\Messages\Notice\HorizontalContent;
use PhpPackagist\WorkWeixinBot\Messages\Notice\ImageTextArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Jump;
use PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle;
use PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea;
use PhpPackagist\WorkWeixinBot\Messages\Notice\Source;
use PhpPackagist\WorkWeixinBot\Messages\Notice\VerticalContent;
use PhpPackagist\WorkWeixinBot\Messages\Text;
use PhpPackagist\WorkWeixinBot\Messages\TextNotice;

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
        return $this->send(Text::make(...func_get_args()));
    }

    /**
     * Send File Message.
     *
     * @param string $media_id
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendFile(string $media_id): Response
    {
        return $this->send(File::make(...func_get_args()));
    }

    /**
     * Send Image Message.
     *
     * @param string $file_path
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendImage(string $file_path): Response
    {
        return $this->send(Image::file(...func_get_args()));
    }

    /**
     * Send Markdown Message.
     *
     * @param string $content
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendMarkdown(string $content): Response
    {
        return $this->send(Markdown::make(...func_get_args()));
    }

    /**
     * Send News Message.
     *
     * @param  array{Article}  $articles
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendNews(array $articles): Response
    {
        return $this->send(News::make(...func_get_args()));
    }

    /**
     * Send Text Notice Message.
     *
     * @param Source|null          $source
     * @param MainTitle|null       $mainTitle
     * @param EmphasisContent|null $emphasisContent
     * @param QuoteArea|null       $quoteArea
     * @param string               $subTitleText
     * @param array{HorizontalContent}               $horizontalContentList
     * @param array{Jump}                $jumpList
     * @param CardAction|null $cardAction
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendTextNotice(
        ?Source $source = null,
        ?MainTitle $mainTitle = null,
        ?EmphasisContent $emphasisContent = null,
        ?QuoteArea $quoteArea = null,
        string $subTitleText = '',
        array $horizontalContentList = [],
        array $jumpList = [],
        ?CardAction $cardAction = null
    ): Response {
        return $this->send(TextNotice::make(...func_get_args()));
    }

    /**
     * Send News Notice Message.
     *
     * @param Source|null        $source
     * @param MainTitle|null     $mainTitle
     * @param CardImage|null     $cardImage
     * @param ImageTextArea|null $imageTextArea
     * @param QuoteArea|null     $quoteArea
     * @param array{VerticalContent}              $verticalContentList
     * @param array{HorizontalContent}              $horizontalContentList
     * @param array{Jump}              $jumpList
     * @param CardAction|null $cardAction
     *
     * @return Response
     *
     * @throws GuzzleException
     */
    public function sendNewsNotice(
        ?Source $source = null,
        ?MainTitle $mainTitle = null,
        ?CardImage $cardImage = null,
        ?ImageTextArea $imageTextArea = null,
        ?QuoteArea $quoteArea = null,
        array $verticalContentList = [],
        array $horizontalContentList = [],
        array $jumpList = [],
        ?CardAction $cardAction = null
    ): Response {
        return $this->send(NewsNotice::make(...func_get_args()));
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
