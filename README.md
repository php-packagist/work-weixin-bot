# work-weixin-bot
> 企业微信机器人

## 介绍
企业微信机器人，基于企业微信机器人开发，支持文本、图片、markdown、图文等消息类型，支持多种消息类型的混合发送。

## 安装
```composer require php-packagist/work-weixin-bot```

## 使用
```php
use PhpPackagist\WorkWeixinBot;

$workWeixinBot =  new WorkWeixinBot([
'key'=>'YOU_BOT_KEY',
]);
//发送文本消息
$workWeixinBot->sendText('测试文本消息');
//发送markdown消息
$workWeixinBot->sendMarkdown('测试markdown消息',['@all'],['@all']);
//发送图片
$workWeixinBot->sendImage('IMAGE_BASE64','IMAGE_MD5');
//发送新闻
$workWeixinBot->sendNews([
    [
        'title' => '测试新闻标题',
        'description' => '测试新闻描述',
        'url' => 'URL',
        'picurl' => 'IMAGE_URL',
    ]
]);
```
## 当然,你也可以在laravel中项目中这么使用
### Facades
```php
use PhpPackagist\WorkWeixinBot\Laravel\Facades\WorkWeixinBot;

//发送文本消息
WorkWeixinBot::sendText('测试文本消息');
//发送markdown消息
WorkWeixinBot::sendMarkdown('测试markdown消息',['@all'],['@all']);
//发送图片
WorkWeixinBot::sendImage('IMAGE_BASE64','IMAGE_MD5');
//发送新闻
WorkWeixinBot::sendNews([
    [
        'title' => '测试新闻标题',
        'description' => '测试新闻描述',
        'url' => 'URL',
        'picurl' => 'IMAGE_URL',
    ]
]);
```

### Notification
```php
use Illuminate\Support\Facades\Notification;
use PhpPackagist\WorkWeixinBot\Messages\TextNotice;

Notification::send(Notification::route('work-wechat-bot', 'default'), new TextNotification('测试文本消息'));
```
