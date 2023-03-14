<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

/**
 * Text Message body.
 */
class Text extends Message
{
    // message content
    protected string $content;

    // if you @ someone, you can use this property to set the mentioned list
    // if you want to @all, you can set this property to ['@all']
    protected array $mentioned_list = [];

    // if you @ someone, you can use this property to set the mentioned mobile list
    // if you want to @all, you can set this property to ['@all']
    protected array $mentioned_mobile_list = [];

    public function __construct(string $content = '', array $mentioned_list = [], array $mentioned_mobile_list = [])
    {
        $this->content = $content;
        $this->mentioned_list = $mentioned_list;
        $this->mentioned_mobile_list = $mentioned_mobile_list;
    }

    public function toArray(): array
    {
        return [
            'msgtype' => 'text',
            'text'    => [
                'content' => $this->content,
                'mentioned_list' => $this->mentioned_list,
                'mentioned_mobile_list' => $this->mentioned_mobile_list,
            ],
        ];
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param  string  $content
     *
     * @return Text
     */
    public function setContent(string $content): Text
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array
     */
    public function getMentionedList(): array
    {
        return $this->mentioned_list;
    }

    /**
     * @param  array  $mentioned_list
     *
     * @return Text
     */
    public function setMentionedList(array $mentioned_list): Text
    {
        $this->mentioned_list = $mentioned_list;
        return $this;
    }

    /**
     * @return array
     */
    public function getMentionedMobileList(): array
    {
        return $this->mentioned_mobile_list;
    }

    /**
     * @param  array  $mentioned_mobile_list
     *
     * @return Text
     */
    public function setMentionedMobileList(array $mentioned_mobile_list): Text
    {
        $this->mentioned_mobile_list = $mentioned_mobile_list;
        return $this;
    }


}
