# work-weixin-bot
> 企业微信机器人

## 介绍
企业微信机器人，基于企业微信机器人开发，支持文本、图片、markdown、图文等消息类型，支持多种消息类型的混合发送,暂不支持卡片式的消息类型。

## 安装
```composer require php-packagist/work-weixin-bot```

## 使用
```php
use PhpPackagist\WorkWeixinBot\Bot;
use PhpPackagist\WorkWeixinBot\Messages\Text;
use PhpPackagist\WorkWeixinBot\Messages\News;
use PhpPackagist\WorkWeixinBot\Messages\Image;
use PhpPackagist\WorkWeixinBot\Messages\Markdown;
use PhpPackagist\WorkWeixinBot\Messages\News\Article;

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
### Facades
```php
use PhpPackagist\WorkWeixinBot\Messages\Text;
use PhpPackagist\WorkWeixinBot\Messages\News;
use PhpPackagist\WorkWeixinBot\Messages\Image;
use PhpPackagist\WorkWeixinBot\Messages\Markdown;
use PhpPackagist\WorkWeixinBot\Messages\News\Article;
use PhpPackagist\WorkWeixinBot\Laravel\Facades\WorkWeixinBot;

//发送文本消息
WorkWeixinBot::send(new Text('测试文本消息')));
//发送markdown消息
WorkWeixinBot::send(new Markdown('测试markdown消息',['@all'],['@all']));
//发送图片
WorkWeixinBot::send(new Image('IMAGE_PATH'));
//发送新闻
WorkWeixinBot::send(new News([new Article('测试新闻标题','测试新闻描述','URL','IMAGE_URL')])));
```

>你也可以使用另外的机器人配置,你只需要
```php
WorkWeixinBot::derive('other');
```

### Notification
```php
use Illuminate\Support\Facades\Notification;
use PhpPackagist\WorkWeixinBot\Messages\TextNotice;

Notification::send(Notification::route('work-wechat-bot', 'default'), new TextNotification('测试文本消息'));
```
