<?php

/**
 * This file is part of work-weixin-bot.
 *
 * @see https://github.com/php-packagist/work-weixin-bot
 */

return [
    'default' => 'default',

    'drivers' => [
        'default' => [
            'key' => env('WORK_WEIXIN_BOT_KEY', ''),
        ],

        'another' => [
            'key' => env('WORK_WEIXIN_BOT_KEY', ''),
        ],
    ],
];
