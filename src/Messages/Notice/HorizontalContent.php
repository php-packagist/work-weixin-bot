<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

class HorizontalContent extends AbstractSubMessage
{
    public const TYPE_DEFAULT = 0;
    public const TYPE_URL     = 1;
    public const TYPE_MEDIA   = 2;

    protected string $keyname;
    protected string $value;
    protected int $type;
    protected string $url;
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
