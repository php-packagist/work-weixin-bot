<?php

namespace PhpPackagist\WorkWeixinBot\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \PhpPackagist\WorkWeixinBot\Response sendText(string $content, array $mentionedList = [], array $mentionedMobileList = [])
 * @method static \PhpPackagist\WorkWeixinBot\Response sendMarkdown(string $content, array $mentionedList = [], array $mentionedMobileList = [])
 * @method static \PhpPackagist\WorkWeixinBot\Response sendImage(string $content, array $mentionedList = [], array $mentionedMobileList = [])
 * @method static \PhpPackagist\WorkWeixinBot\Response sendNews(array $articles, array $mentionedList = [], array $mentionedMobileList = [])
 * @method static \PhpPackagist\WorkWeixinBot\Response sendRaw(array $data)
 * @method static \PhpPackagist\WorkWeixinBot\Bot driver(string $driver = null)
 */
class WorkWeixinBot extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'work-weixin-bot';
    }
}
