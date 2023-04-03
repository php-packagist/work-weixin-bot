<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractMessage;

class File extends AbstractMessage
{
    /**
     * @var string
     */
    protected string $media_id;

    /**
     * @param string $media_id
     */
    public function __construct(string $media_id = '')
    {
        $this->setMediaId($media_id);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'msgtype' => 'file',
            'file'    => [
                'media_id' => $this->media_id,
            ],
        ];
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
     * @return File
     */
    public function setMediaId(string $media_id): self
    {
        $this->media_id = $media_id;

        return $this;
    }
}
