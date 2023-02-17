<?php

namespace PhpPackagist\WorkWeixinBot\Laravel;

use Illuminate\Support\Manager as LaravelManager;
use InvalidArgumentException;
use PhpPackagist\WorkWeixinBot\Bot;

class Manager extends LaravelManager
{
    /**
     * @param $name
     *
     * @return Bot
     */
    public function channel($name = null): Bot
    {
        return $this->driver($name);
    }

    /**
     * Create a new driver instance.
     *
     * @param string $driver
     *
     * @return Bot
     */
    protected function createDriver($driver): Bot
    {
        // First, we will determine if a custom driver creator exists for the given driver and
        // if it does not we will check for a creator method for the driver. Custom creator
        // callbacks allow developers to build their own "drivers" easily using Closures.
        if (isset($this->customCreators[$driver])) {
            return $this->callCustomCreator($driver);
        }

        return $this->createBotDriver($driver);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver(): string
    {
        return $this->config->get('work-weixin-bot.default');
    }

    /**
     * Create a new bot driver instance.
     *
     * @param string $driver
     *
     * @return Bot
     */
    protected function createBotDriver(string $driver): Bot
    {
        $config = $this->config->get('work-weixin-bot.drivers.'.$driver);

        if (is_null($config)) {
            throw new InvalidArgumentException(sprintf('Unable to resolve NULL driver for [%s].', static::class));
        }

        return new Bot($config);
    }
}
