# work-weixin-bot
> 企业微信机器人

## 介绍
企业微信机器人，基于企业微信机器人开发，支持文本、图片、markdown、图文等消息类型，支持多种消息类型的混合发送,暂不支持卡片式的消息类型。

## 安装
```composer require php-packagist/work-weixin-bot```

## 使用

```php
use PhpPackagist\WorkWeixinBot\Bot;
use PhpPackagist\WorkWeixinBot\Contracts\Text;
use PhpPackagist\WorkWeixinBot\Contracts\News;
use PhpPackagist\WorkWeixinBot\Contracts\Image;
use PhpPackagist\WorkWeixinBot\Contracts\Markdown;
use PhpPackagist\WorkWeixinBot\Contracts\News\Article;

$bot =  new Bot([
'key'=>'YOU_BOT_KEY',
]);
//发送文本消息
$bot->send(new Text('测试文本消息')));
//发送markdown消息
$bot->send(new Markdown('测试markdown消息',['@all'],['@all']));
//发送图片
$bot->send(new Image('IMAGE_PATH'));
//发送新闻
$bot->send(new News([new Article('测试新闻标题','测试新闻描述','URL','IMAGE_URL')])));
```
## 当然,你也可以在laravel中项目中这么使用

### 首先你需要发布配置
```` php artisan vendor:publish --provider="PhpPackagist\WorkWeixinBot\Laravel\ServiceProvider"````
>执行后会在config目录下生成work-wechat-bot.php文件

### 配置
```php
return [
    // 默认使用的机器人配置
    'default' => 'default',
    // 机器人配置
    'drivers' => [
        'default' => [
            'key' => env('WORK_WEIXIN_BOT_KEY', ''),
        ],
];

````
### Facades

```php
use PhpPackagist\WorkWeixinBot\Contracts\Text;
use PhpPackagist\WorkWeixinBot\Contracts\News;
use PhpPackagist\WorkWeixinBot\Contracts\Image;
use PhpPackagist\WorkWeixinBot\Contracts\Markdown;
use PhpPackagist\WorkWeixinBot\Contracts\News\Article;
use PhpPackagist\WorkWeixinBot\Laravel\Facades\WorkWeixinBot;

//发送文本消息
WorkWeixinBot::send(new Text('测试文本消息')));
//发送markdown消息
WorkWeixinBot::send(new Markdown('测试markdown消息',['@all'],['@all']));
//发送图片
WorkWeixinBot::send(new Image('IMAGE_PATH'));
//发送新闻
WorkWeixinBot::send(new News([new Article('测试新闻标题','测试新闻描述','URL','IMAGE_URL')])));
//发送文件 (文件需要先上传到企业微信服务器,获取media_id,然后再发送)
WorkWeixinBot::send(new File('MEDIA_ID')));
//上传文件
WorkWeixinBot::upload('FILE_PATH');

//你也可以使用另外的机器人配置,你只需要
WorkWeixinBot::derive('other');
```

### Notification
```php
use Illuminate\Support\Facades\Notification;
use PhpPackagist\WorkWeixinBot\Laravel\Notifications\TextNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Notifications\MarkdownNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Notifications\ImageNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Notifications\FileNotification;

// 文本发送
Notification::send(Notification::route('work-wechat-bot', 'default'), new TextNotification('测试文本消息'));
// markdown发送
Notification::send(Notification::route('work-wechat-bot', 'default'), new MarkdownNotification('# 测试markdown消息'));
// 图片发送
Notification::send(Notification::route('work-wechat-bot', 'default'), new ImageNotification('IMAGE_PATH'));
// 文件发送
Notification::send(Notification::route('work-wechat-bot', 'default'), new FileNotification('MEDIA_ID'));
// 图文发送
$articleArray = [new Article('test','test','URL','IMAGE_URL')];
Notification::send(Notification::route('work-weixin-bot', 'default'), new NewsNotification($articleArray));
// 如果想发给多个机器人
collect(['default','other'])
    ->transform(function ($route) {
        return  Notification::route('work-wechat-bot', $route);
    })
    ->tap(function (Collection $notifiables) use ($message) {
        Notification::send($notifiables, new TextNotification($message));
    });
```
>未完待续...
