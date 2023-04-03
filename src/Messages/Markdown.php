<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

/**
 * markdown Message body.
 */
class Markdown extends AbstractMessage
{
    /**
     * markdown message content
     *
     * @var string
     *
     * @example # title 1
     *          ## title 2
     *          ### title 3
     *          #### title 4
     *          ##### title 5
     *          ###### title 6
     *          **bold**
     *          [it's a link](https://www.baidu.com)
     *          `code`
     *          > quote
     */
    protected string $content;

    /**
     * @param string $content
     */
    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype'  => 'markdown',
            'markdown' => [
                'content' => $this->getContent(),
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
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
