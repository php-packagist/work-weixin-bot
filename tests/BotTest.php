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
    $response = bot()->sendMarkdown(
        <<<MARKDOWN
 # Hello world!
 **Hello world!**
 [GitHub Site](https://github.com)
 `<?php echo 'Hello world!'; ?>`
 > Hello world!
 <font color="info">green</font>
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

test('send text notice', function () {
    $this->assertEquals('{"errcode":0,"errmsg":"ok"}', bot()->sendTextNotice(
        \PhpPackagist\WorkWeixinBot\Messages\Notice\Source::make('https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0', '企业微信', 0),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle::make('欢迎使用企业微信', '您的好友正在邀请您加入企业微信'),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\EmphasisContent::make('100', '数据含义'),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea::make(1, '引用文本标题', 'Jack：企业微信真的很好用~\nBalian：超级好的一款软件！', 'https://work.weixin.qq.com/?from=openApi'),
        '下载企业微信还能抢红包！',
        [
            \PhpPackagist\WorkWeixinBot\Messages\Notice\HorizontalContent::make('邀请人', '点击访问', 1, 'https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0'),
        ],
        [
            \PhpPackagist\WorkWeixinBot\Messages\Notice\Jump::make(1, '企业微信官网', 'https://work.weixin.qq.com/?from=openApi'),
        ],
        \PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction::make(1, 'https://work.weixin.qq.com/?from=openApi')
    )->getBody());
});

test('send news notice', function () {
    $this->assertEquals('{"errcode":0,"errmsg":"ok. WARNING: field `template_card.card_image.aspect_ratio` expect type `double`. "}', bot()->sendNewsNotice(
        \PhpPackagist\WorkWeixinBot\Messages\Notice\Source::make('https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0', '企业微信', 0),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\MainTitle::make('欢迎使用企业微信', '您的好友正在邀请您加入企业微信'),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\CardImage::make('https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0'),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\ImageTextArea::make(0, '企业微信邀请函', '欢迎使用企业微信，您的好友正在邀请您加入企业微信，点击立即加入。', 'https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0'),
        \PhpPackagist\WorkWeixinBot\Messages\Notice\QuoteArea::make(1, '引用文本标题', 'Jack：企业微信真的很好用~\nBalian：超级好的一款软件！', 'https://work.weixin.qq.com/?from=openApi'),
        [
            \PhpPackagist\WorkWeixinBot\Messages\Notice\VerticalContent::make('惊喜红包等你来拿', '下载企业微信还能抢红包！'),
            \PhpPackagist\WorkWeixinBot\Messages\Notice\VerticalContent::make('惊喜红包等你来拿', '下载企业微信还能抢红包！'),
        ],
        [
            \PhpPackagist\WorkWeixinBot\Messages\Notice\HorizontalContent::make('邀请人666', '点击访问', 1, 'https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0'),
        ],
        [
            \PhpPackagist\WorkWeixinBot\Messages\Notice\Jump::make(1, '企业微信官网', 'https://work.weixin.qq.com/?from=openApi'),
        ],
        \PhpPackagist\WorkWeixinBot\Messages\Notice\CardAction::make(1, 'https://work.weixin.qq.com/?from=openApi'),
    )->getBody());
});
