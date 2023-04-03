<?php

function bot(): PhpPackagist\WorkWeixinBot\Bot
{
    return new \PhpPackagist\WorkWeixinBot\Bot([
        'key' => getenv('BOT_KEY') ?? '',
    ]);
}

test('send', function () {
    $response = bot()->send(
        new \PhpPackagist\WorkWeixinBot\Messages\Text('hello world, PHP Version:'.phpversion())
    );

    $this->assertTrue($response->success());
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', $response->getBody());
});

test('send text', function () {
    $response = bot()->sendText('hello world, PHP Version:'.phpversion());

    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', $response->getBody());
});

test('send markdown', function () {
    $response = bot()->sendMarkdown(<<<MARKDOWN
# 123123
**test**
[GitHub Site](https://github.com)
MARKDOWN
    );

    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', $response->getBody());
});

test('send news', function () {
    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', bot()->sendNews([
        [
            'title'       => '中秋节礼品领取',
            'description' => '今年中秋节公司有豪礼相送',
            'url'         => 'URL',
            'picurl'      => 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
        ],
        [
            'title'       => '中秋节礼品领取',
            'description' => '今年中秋节公司有豪礼相送',
            'url'         => 'URL',
            'picurl'      => 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
        ],
    ])->getBody());
});

test('send image', function () {
    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', bot()->sendImage(
        'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png'
    )->getBody());
});
