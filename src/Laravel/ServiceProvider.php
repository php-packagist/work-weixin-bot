<?php

namespace PhpPackagist\WorkWeixinBot\Laravel;

use Illuminate\Log\LogManager;
use Illuminate\Notifications\ChannelManager;
use PhpPackagist\WorkWeixinBot\Laravel\Handler\LogHandler;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use PhpPackagist\WorkWeixinBot\Laravel\Channels\WorkWechatChannel;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->setupConfig();

        $this->app->singleton('work-weixin-bot', function () {
            return new Manager($this->app);
        });

        $this->app->make(ChannelManager::class)
            ->extend(WorkWechatChannel::CHANNELS_NAME, function ($app) {
            return $app->make(WorkWechatChannel::class);
        });
    }

    /**
     * Set up the config.
     *
     * @return void
     */
    protected function setupConfig(): void
    {
        $source = realpath($raw = __DIR__.'/../../config/work-weixin-bot.php') ?: $raw;

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => config_path('work-weixin-bot.php'),
            ], 'work-weixin-bot');
        }

        $this->mergeConfigFrom($source, 'work-weixin-bot');
    }
}
