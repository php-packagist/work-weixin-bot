<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

class Card extends Message
{

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype'       => 'template_card',
            'template_card' => [
                'card_type' => 'news_notice',
            ],
        ];
    }
}
