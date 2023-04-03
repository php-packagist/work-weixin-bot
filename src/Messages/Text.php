<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

class Text extends AbstractMessage
{
    /**
     * @var string
     */
    protected string $content;

    /**
     * @var array if you @all or @someone, you can use this property to set the mentioned list
     */
    protected array $mentioned_list = [];

    /**
     * @var array if you @all or @someone, you can use this property to set the mentioned mobile list
     */
    protected array $mentioned_mobile_list = [];

    /**
     * Text constructor.
     *
     * @param string $content
     * @param array  $mentioned_list
     * @param array  $mentioned_mobile_list
     */
    public function __construct(string $content = '', array $mentioned_list = [], array $mentioned_mobile_list = [])
    {
        $this->setContent($content);
        $this->setMentionedList($mentioned_list);
        $this->setMentionedMobileList($mentioned_mobile_list);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype' => 'text',
            'text'    => [
                'content'               => $this->getContent(),
                'mentioned_list'        => $this->getMentionedList(),
                'mentioned_mobile_list' => $this->getMentionedMobileList(),
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
     * @param string $content
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
     * @param array $mentioned_list
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
     * @param array $mentioned_mobile_list
     *
     * @return Text
     */
    public function setMentionedMobileList(array $mentioned_mobile_list): self
    {
        $this->mentioned_mobile_list = $mentioned_mobile_list;

        return $this;
    }
}
