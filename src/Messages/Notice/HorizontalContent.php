<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

/**
 * Horizontal Content format
 */
class HorizontalContent extends AbstractSubMessage
{
    // 0: default
    public const TYPE_DEFAULT = 0;
    // 1: jump to the specified URL
    public const TYPE_URL = 1;
    // 2: file media
    public const TYPE_MEDIA = 2;

    /**
     * subtitle
     * propose:No more than 5 words
     *
     * @var string
     */
    protected string $keyname;

    /**
     * content
     * if type is 2 so field is file name.
     * propose:No more than 20 words
     *
     * @var string
     */
    protected string $value;

    /**
     * 0: default
     * 1: jump to the specified URL
     * 2: file media
     *
     * @var int
     */
    protected int $type;

    /**
     * link url
     *
     * @var string
     */
    protected string $url;

    /**
     * file media id
     *
     * @var string
     */
    protected string $media_id;

    public function __construct(string $keyname = '', string $value = '', int $type = self::TYPE_DEFAULT, string $url = '', string $media_id = '')
    {
        $this->setKeyname($keyname)->setValue($value)->setType($type)->setUrl($url)->setMediaId($media_id);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        switch ($this->getType()) {
            case self::TYPE_DEFAULT:
                return [
                    'keyname' => $this->getKeyname(),
                    'value'   => $this->getValue(),
                ];
            case self::TYPE_URL:
                return [
                    'keyname' => $this->getKeyname(),
                    'value'   => $this->getValue(),
                    'type'    => $this->getType(),
                    'url'     => $this->getUrl(),
                ];
            case self::TYPE_MEDIA:
                return [
                    'keyname'  => $this->getKeyname(),
                    'value'    => $this->getValue(),
                    'type'     => $this->getType(),
                    'media_id' => $this->getMediaId(),
                ];
        }
        return [];
    }

    /**
     * @return string
     */
    public function getKeyname(): string
    {
        return $this->keyname;
    }

    /**
     * @param string $keyname
     *
     * @return HorizontalContent
     */
    public function setKeyname(string $keyname): HorizontalContent
    {
        $this->keyname = $keyname;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return HorizontalContent
     */
    public function setValue(string $value): HorizontalContent
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return HorizontalContent
     */
    public function setType(int $type): HorizontalContent
    {
        $this->type = $type;
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
     * @return HorizontalContent
     */
    public function setUrl(string $url): HorizontalContent
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getMediaId(): string
    {
        return $this->media_id;
    }

    /**
     * @param string $media_id
     *
     * @return HorizontalContent
     */
    public function setMediaId(string $media_id): HorizontalContent
    {
        $this->media_id = $media_id;
        return $this;
    }
}
