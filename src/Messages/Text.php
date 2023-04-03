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
    protected array $mentionedList = [];

    /**
     * @var array if you @all or @someone, you can use this property to set the mentioned mobile list
     */
    protected array $mentionedMobileList = [];

    /**
     * Text constructor.
     *
     * @param string $content
     * @param array  $mentionedList
     * @param array  $mentionedMobileList
     */
    public function __construct(string $content = '', array $mentionedList = [], array $mentionedMobileList = [])
    {
        $this->setContent($content);
        $this->setMentionedList($mentionedList);
        $this->setMentionedMobileList($mentionedMobileList);
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
        return $this->mentionedList;
    }

    /**
     * @param array $mentionedList
     *
     * @return Text
     */
    public function setMentionedList(array $mentionedList): Text
    {
        $this->mentionedList = $mentionedList;

        return $this;
    }

    /**
     * @return array
     */
    public function getMentionedMobileList(): array
    {
        return $this->mentionedMobileList;
    }

    /**
     * @param array $mentionedMobileList
     *
     * @return Text
     */
    public function setMentionedMobileList(array $mentionedMobileList): self
    {
        $this->mentionedMobileList = $mentionedMobileList;

        return $this;
    }
}
