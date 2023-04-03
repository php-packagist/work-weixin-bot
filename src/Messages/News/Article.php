<?php

namespace PhpPackagist\WorkWeixinBot\Messages\News;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

/**
 * News Message articles item class
 */
class Article extends AbstractSubMessage
{
    /**
     * title
     *
     * @var string
     */
    protected string $title;

    /**
     * description
     *
     * @var string
     */
    protected string $description;

    /**
     * link
     *
     * @var string
     */
    protected string $url;

    /**
     * image link
     *
     * @var string
     */
    protected string $picurl;

    public function __construct(string $title = '', string $description = '', string $url = '', string $picurl = '')
    {
        $this->setTitle($title)
            ->setDescription($description)
            ->setUrl($url)
            ->setPicurl($picurl)
        ;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'       => $this->getTitle(),
            'description' => $this->getDescription(),
            'url'         => $this->getUrl(),
            'picurl'      => $this->getPicurl(),
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicurl(): string
    {
        return $this->picurl;
    }

    /**
     * @param string $picurl
     *
     * @return self
     */
    public function setPicurl(string $picurl): self
    {
        $this->picurl = $picurl;

        return $this;
    }
}
