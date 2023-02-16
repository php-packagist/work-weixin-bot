<?php

test('send message', function () {
    $bot = new \PhpPackagist\WorkWeixinBot\Bot([
        'key' => getenv('BOT_KEY') ?? '',
    ]);

    $response = $bot->sendText('hello world, PHP Version:'.phpversion());
    $this->assertTrue($response->success());
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', $response->getBody());

    // $bot->sendText('hello world <a href="https://github.com">test</a>');
    // $bot->sendText('hello world <a href="https://github.com">test</a>', ['@all']);
    //
    // $bot->sendMarkdown('# 123123 \n **test** [Github Site](https://github.com)');
    //
    // $bot->sendNews([
    //     [
    //         'title'       => '中秋节礼品领取',
    //         'description' => '今年中秋节公司有豪礼相送',
    //         'url'         => 'URL',
    //         'picurl'      => 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
    //     ],
    //     [
    //         'title'       => '中秋节礼品领取',
    //         'description' => '今年中秋节公司有豪礼相送',
    //         'url'         => 'URL',
    //         'picurl'      => 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
    //     ],
    // ]);

    $this->assertTrue(true);
});
